
let SelectedOption = () =>{
    let tipopregunta = document.getElementById("tipopregunta").value
    let questiontype = document.getElementById("questiontype")
    questiontype.innerHTML = ""

    switch(tipopregunta){
        case "open":
            let input = document.createElement("input")
            input.setAttribute("type","text")
            input.setAttribute("placeholder"," Espacio libre para respuesta ")
            input.setAttribute("size","50")
            questiontype.appendChild(input)
            break;
       
        case "selection":
            for( let i = 0; i < 5;i++){
                let input = document.createElement("input")
                input.setAttribute("type","checkbox")
                input.setAttribute("id","check"+(i+1))
                let input2 = document.createElement("input")
                input2.setAttribute("type","text")
                input2.setAttribute("placeholder"," Escribe opcion "+(i+1))
                questiontype.appendChild(input)
                questiontype.appendChild(input2)
            }
            break;
        case "multiple":
            for( let i = 0; i < 5;i++){
                let input = document.createElement("input")
                input.setAttribute("type","radio")
                input.setAttribute("id","radio"+(i+1))
                let input2 = document.createElement("input")
                input2.setAttribute("type","text")
                input2.setAttribute("placeholder"," Escribe opcion "+(i+1))
                questiontype.appendChild(input)
                questiontype.appendChild(input2)

            }
           
        break;
        default:
            break
    }
}



