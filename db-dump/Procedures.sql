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
CREATE PROCEDURE CreateQuestion(IN id_Survey INT, IN question VARCHAR(55), IN type TEXT)
BEGIN
	INSERT INTO Question VALUES (0, id_Survey, question, type);
END //
DELIMITER ;

-- CALL CreateQuestion(1,'Pregunta1','Opcion multiple');


-- Read a specific Question from id
DROP PROCEDURE IF EXISTS ReadQuestion;
DELIMITER //
CREATE PROCEDURE ReadQuestion(IN id_Survey INT)
BEGIN
	SELECT * FROM Question WHERE Question.id_Survey = id_Survey;
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
SELECT * FROM Question;

-- ==========Answer=================================================================================================== --
-- Create a new Multiple_Option
DROP PROCEDURE IF EXISTS CreateMultiple_Option;
DELIMITER //
CREATE PROCEDURE CreateMultiple_Option(IN question VARCHAR(255), IN answer VARCHAR(255))
BEGIN
	DECLARE id_Question INT;
    SELECT Question.id INTO id_Question FROM Question WHERE Question.question = question LIMIT 1;
	INSERT INTO Multiple_Option VALUES (0, id_Question, answer);
END //
DELIMITER ;


-- CALL CreateMultiple_Option(1,'Respuesta1');


-- Read a specific Multiple_Option from id
DROP PROCEDURE IF EXISTS ReadMultiple_Option;
DELIMITER //
CREATE PROCEDURE ReadMultiple_Option(IN id_Question INT)
BEGIN
	SELECT * FROM Multiple_Option WHERE Multiple_Option.id_Question = id_Question;
END //
DELIMITER ;

-- CALL ReadMultiple_Option(1);


-- Update values in Multiple_Option
DROP PROCEDURE IF EXISTS UpdateMultiple_Option;
DELIMITER //
CREATE PROCEDURE UpdateMultiple_Option(IN id INT, IN answer VARCHAR(255))
BEGIN
	UPDATE Multiple_Option SET Multiple_Option.answer = answer WHERE Multiple_Option.id=id; 
END //
DELIMITER ;

-- CALL UpdateMultiple_Option(1,'Nueva respuesta');


-- Delete a Multiple_Option by id
DROP PROCEDURE IF EXISTS DeleteMultiple_Option;
DELIMITER //
CREATE PROCEDURE DeleteMultiple_Option(IN id INT)
BEGIN
	DELETE FROM Multiple_Option WHERE Multiple_Option.id = id;
END //
DELIMITER ;

-- CALL DeleteMultiple_Option(1);










