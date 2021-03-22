-- Stored procedures for control better control of the DB
-- =================SURVEY==================================================================================== --
-- Create a new Survey
DROP PROCEDURE IF EXISTS CreateSurvey;
DELIMITER //
CREATE PROCEDURE CreateSurvey(IN name VARCHAR(55), IN description TEXT)
BEGIN
	INSERT INTO Survey VALUES (0, name, description);
END //
DELIMITER ;

-- CALL CreateSurvey('Encuesta1','Esta es una descripcion');


-- Read all in the table Survey
DROP PROCEDURE IF EXISTS ReadAllSurvey;
DELIMITER //
CREATE PROCEDURE ReadAllSurvey()
BEGIN
	SELECT * FROM Survey;
END //
DELIMITER ;

-- CALL ReadAllSurvey();


-- Read a specific Survey from id
DROP PROCEDURE IF EXISTS ReadSurvey;
DELIMITER //
CREATE PROCEDURE ReadSurvey(IN id INT)
BEGIN
	SELECT * FROM Survey WHERE Survey.id = id;
END //
DELIMITER ;

-- CALL ReadSurvey(1);


-- Update values in Survey
DROP PROCEDURE IF EXISTS UpdateSurvey;
DELIMITER //
CREATE PROCEDURE UpdateSurvey(IN id INT, IN name VARCHAR(55), IN description TEXT)
BEGIN
	UPDATE Survey SET Survey.name= name, Survey.description=description WHERE Survey.id=id; 
END //
DELIMITER ;

-- CALL UpdateSurvey(1,'Nuevo nombre', 'Nueva descripcion');


-- Delete a Survey by id
DROP PROCEDURE IF EXISTS DeleteSurvey;
DELIMITER //
CREATE PROCEDURE DeleteSurvey(IN id INT)
BEGIN
	DELETE FROM Survey WHERE Survey.id = id;
END //
DELIMITER ;

-- CALL DeleteSurvey(1);

-- ==========QUESTION=================================================================================================== --
-- Create a new Question
DROP PROCEDURE IF EXISTS CreateQuestion;
DELIMITER //
CREATE PROCEDURE CreateQuestion(IN question VARCHAR(55), IN type TEXT)
BEGIN
	INSERT INTO Question VALUES (0, question, type);
END //
DELIMITER ;

-- CALL CreateQuestion('Pregunta1','Opcion multiple');


-- Read a specific Question from id
DROP PROCEDURE IF EXISTS ReadQuestion;
DELIMITER //
CREATE PROCEDURE ReadQuestion(IN id INT)
BEGIN
	SELECT * FROM Question WHERE Question.id = id;
END //
DELIMITER ;
-- CALL ReadQuestion(1);
-- SELECT * FROM Question;

-- Update values in Question
DROP PROCEDURE IF EXISTS UpdateQuestion;
DELIMITER //
CREATE PROCEDURE UpdateQuestion(IN id INT, IN question VARCHAR(55), IN type TEXT)
BEGIN
	UPDATE Question SET Question.question= question, Question.type=type WHERE Question.id=id; 
END //
DELIMITER ;

-- CALL UpdateQuestion(1,'Nueva pregunta', 'Nuevo tipo: Libre');


-- Delete a Question by id
DROP PROCEDURE IF EXISTS DeleteQuestion;
DELIMITER //
CREATE PROCEDURE DeleteQuestion(IN id INT)
BEGIN
	DELETE FROM Question WHERE Question.id = id;
END //
DELIMITER ;

-- CALL DeleteQuestion(1);


-- ==========Answer=================================================================================================== --
-- Create a new Answer
DROP PROCEDURE IF EXISTS CreateAnswer;
DELIMITER //
CREATE PROCEDURE CreateAnswer(IN question VARCHAR(255))
BEGIN
	INSERT INTO Answer VALUES (0, question);
END //
DELIMITER ;

-- CALL CreateAnswer('Respuesta1');


-- Read a specific Answer from id
DROP PROCEDURE IF EXISTS ReadAnswer;
DELIMITER //
CREATE PROCEDURE ReadAnswer(IN id INT)
BEGIN
	SELECT * FROM Answer WHERE Answer.id = id;
END //
DELIMITER ;

-- CALL ReadAnswer(3);

-- SELECT * FROM Answer;

-- Update values in Answer
DROP PROCEDURE IF EXISTS UpdateAnswer;
DELIMITER //
CREATE PROCEDURE UpdateAnswer(IN id INT, IN answer VARCHAR(255))
BEGIN
	UPDATE Answer SET Answer.answer= answer WHERE Answer.id=id; 
END //
DELIMITER ;

-- CALL UpdateAnswer(1,'Nueva respuesta');


-- Delete a Answer by id
DROP PROCEDURE IF EXISTS DeleteAnswer;
DELIMITER //
CREATE PROCEDURE DeleteAnswer(IN id INT)
BEGIN
	DELETE FROM Answer WHERE Answer.id = id;
END //
DELIMITER ;

-- CALL DeleteAnswer(1);


-- ==========Survey_Question=================================================================================================== --

-- Create a new realtion Survey_Question
DROP PROCEDURE IF EXISTS CreateSurvey_Question;
DELIMITER //
CREATE PROCEDURE CreateSurvey_Question(IN id_Survey INT, IN question VARCHAR(55) )
BEGIN
	DECLARE id_Question INT;
    SELECT Question.id INTO id_Question FROM Question WHERE Question.question = question ORDER BY Question.id DESC LIMIT 1;
    
	INSERT INTO Survey_Question VALUES (id_Survey, id_Question);
END //
DELIMITER ;

-- SELECT * FROM Survey_Question;
-- SELECT * FROM Question;
-- CALL CreateSurvey_Question(1,'sdsdf');
-- CALL CreateSurvey_Question(1,4);
-- CALL CreateSurvey_Question(1,5);
-- CALL CreateSurvey_Question(1,6);
-- CALL CreateSurvey_Question(1,7);



-- Read a specific Survey_Question from id_Survey
DROP PROCEDURE IF EXISTS ReadSurvey_QuestionFromSurvey;
DELIMITER //
CREATE PROCEDURE ReadSurvey_QuestionFromSurvey(IN id_Survey INT)
BEGIN

	SELECT id_Survey, id_Question, question, type FROM Survey_Question 
    INNER JOIN Question ON Question.id = Survey_Question.id_Question
    WHERE Survey_Question.id_Survey = id_Survey;
END //
DELIMITER ;

-- CALL ReadSurvey_QuestionFromSurvey(1);


-- Read a specific Survey_Question from id_Question
DROP PROCEDURE IF EXISTS ReadSurvey_QuestionFromQuestion;
DELIMITER //
CREATE PROCEDURE ReadSurvey_QuestionFromQuestion(IN id_Question INT)
BEGIN
	SELECT * FROM Survey_Question WHERE Survey_Question.id_Question = id_Question;
END //
DELIMITER ;

-- CALL ReadSurvey_QuestionFromQuestion(2);


-- Update values in Survey_Question from id_Survey
DROP PROCEDURE IF EXISTS UpdateSurvey_QuestionFromSurvey;
DELIMITER //
CREATE PROCEDURE UpdateSurvey_QuestionFromSurvey(IN id_Survey INT, IN id_Question INT )
BEGIN
	UPDATE Survey_Question SET Survey_Question.id_Question = id_Question WHERE Survey_Question.id_Survey=id_Survey; 
END //
DELIMITER ;

-- CALL UpdateSurvey_QuestionFromSurvey(1,3);


-- Update values in Survey_Question from id_Question
DROP PROCEDURE IF EXISTS UpdateSurvey_QuestionFromQuestion;
DELIMITER //
CREATE PROCEDURE UpdateSurvey_QuestionFromQuestion(IN id_Question INT, IN id_Survey INT )
BEGIN
	UPDATE Survey_Question SET Survey_Question.id_Survey = id_Survey WHERE Survey_Question.id_Question=id_Question; 
END //
DELIMITER ;

-- CALL UpdateSurvey_QuestionFromQuestion(1,3);



-- Delete a Survey_Question from id_Survey
DROP PROCEDURE IF EXISTS DeleteSurvey_QuestionFromSurvey;
DELIMITER //
CREATE PROCEDURE DeleteSurvey_QuestionFromSurvey(IN id_Survey INT)
BEGIN
	DELETE FROM Survey_Question WHERE Survey_Question.id_Survey = id_Survey;
END //
DELIMITER ;

-- CALL DeleteSurvey_QuestionFromSurvey(1);

-- Delete a Survey_Question from id_Question
DROP PROCEDURE IF EXISTS DeleteSurvey_QuestionFromQuestion;
DELIMITER //
CREATE PROCEDURE DeleteSurvey_QuestionFromQuestion(IN id_Question INT)
BEGIN
	DELETE FROM Survey_Question WHERE Survey_Question.id_Question = id_Question;
END //
DELIMITER ;

-- CALL DeleteSurvey_QuestionFromQuestion(1);




-- ==========Question_Answer=================================================================================================== --

-- Create a new realtion Question_Answer
DROP PROCEDURE IF EXISTS CreateQuestion_Answer;
DELIMITER //
CREATE PROCEDURE CreateQuestion_Answer(IN question VARCHAR(55), IN answer INT )
BEGIN
	DECLARE id_Question INT;
	DECLARE id_Answer INT;
    SELECT Question.id INTO id_Question FROM Question WHERE Question.question = question ORDER BY Question.id DESC LIMIT 1;
    SELECT Answer.id INTO id_Answer FROM Answer WHERE Answer.answer = answer ORDER BY Answer.id DESC LIMIT 1;
    
	INSERT INTO Question_Answer VALUES (id_Question, id_Answer);
END //
DELIMITER ;
-- CALL CreateQuestion_Answer(2,2);


-- Read a specific Question_Answer from id_Question
DROP PROCEDURE IF EXISTS ReadQuestion_AnswerFromQuestion;
DELIMITER //
CREATE PROCEDURE ReadQuestion_AnswerFromQuestion(IN id_Question INT)
BEGIN
	SELECT * FROM Question_Answer WHERE Question_Answer.id_Question = id_Question;
END //
DELIMITER ;
-- CALL ReadQuestion_AnswerFromQuestion(2);


-- Read a specific Question_Answer from id_Answer
DROP PROCEDURE IF EXISTS ReadQuestion_AnswerFromAnswer;
DELIMITER //
CREATE PROCEDURE ReadQuestion_AnswerFromAnswer(IN id_Answer INT)
BEGIN
	SELECT * FROM Question_Answer WHERE Question_Answer.id_Answer = id_Answer;
END //
DELIMITER ;

-- CALL ReadQuestion_AnswerFromAnswer(2);


-- Update values in Question_Answer from id_Question
DROP PROCEDURE IF EXISTS UpdateQuestion_AnswerFromQuestion;
DELIMITER //
CREATE PROCEDURE UpdateQuestion_AnswerFromQuestion(IN id_Question INT, IN id_Answer INT )
BEGIN
	UPDATE Question_Answer SET Question_Answer.id_Answer = id_Answer WHERE Question_Answer.id_Question=id_Question; 
END //
DELIMITER ;

--  CALL UpdateQuestion_AnswerFromQuestion(1,3);


-- Update values in Question_Answer from id_Answer
DROP PROCEDURE IF EXISTS UpdateQuestion_AnswerFromAnswer;
DELIMITER //
CREATE PROCEDURE UpdateQuestion_AnswerFromAnswer(IN id_Answer INT, IN id_Question INT )
BEGIN
	UPDATE Question_Answer SET Question_Answer.id_Question = id_Question WHERE Question_Answer.id_Answer=id_Answer; 
END //
DELIMITER ;

-- CALL UpdateQuestion_AnswerFromAnswer(1,3);



-- Delete a Question_Answer from id_Question
DROP PROCEDURE IF EXISTS DeleteQuestion_AnswerFromQuestion;
DELIMITER //
CREATE PROCEDURE DeleteQuestion_AnswerFromQuestion(IN id_Question INT)
BEGIN
	DELETE FROM Question_Answer WHERE Question_Answer.id_Question = id_Question;
END //
DELIMITER ;

-- CALL DeleteQuestion_AnswerFromQuestion(1);

-- Delete a Question_Answer from id_Answer
DROP PROCEDURE IF EXISTS DeleteQuestion_AnswerFromAnswer;
DELIMITER //
CREATE PROCEDURE DeleteQuestion_AnswerFromAnswer(IN id_Answer INT)
BEGIN
	DELETE FROM Question_Answer WHERE Question_Answer.id_Answer = id_Answer;
END //
DELIMITER ;


















