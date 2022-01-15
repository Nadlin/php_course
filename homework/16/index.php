<?php
/*
 --------------------------------------
 расписание занятий конкретной группы:
---------------------------------------
SELECT
	groupstudents.groupnumber,
	subjects.`subject`,
	lessons.lessondate,
	lessons.lessontime,
	lessons.hours,
	classrooms.classroomnumber,
	buildings.address,
	teachers.surname,
	teachers.`name`,
	teachers.middlename,
	positions.position,
	lessontypes.lessontype
FROM
	groupstudents
	INNER JOIN
	groupteachers
	ON
		groupstudents.idcurriculum = groupteachers.idcurriculum AND
        groupstudents.idgroup = groupteachers.idgroup
	INNER JOIN
	subjecthours
	ON
		groupteachers.idcurriculum = subjecthours.idcurriculum AND
        groupteachers.idsubjecthours = subjecthours.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessons
	ON
		groupteachers.idgroupteacher = lessons.idgroupteacher
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
	INNER JOIN
	buildings
	ON
		classrooms.idbuilding = buildings.idbuilding
	INNER JOIN
	teachers
	ON
		groupteachers.idteacher = teachers.idteacher
	INNER JOIN
	positions
	ON
		teachers.idposition = positions.idposition
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
WHERE groupstudents.groupnumber = 'N1'
ORDER BY
	groupnumber ASC,
	lessondate ASC,
	lessontime ASC


-------------------------------
Расписание занятий конкретного преподавателя
------------------------------

SELECT
	CONCAT(teachers.surname, ' ', teachers.`name`, ' ', teachers.middlename) AS teacher,
	lessons.lessondate,
	lessons.lessontime,
	subjects.`subject`,
	lessontypes.lessontype,
	lessons.hours,
	classrooms.classroomnumber,
	buildings.address,
	groupstudents.groupnumber,
	specialities.speciality,
	curriculum.entranceyear,
	educationforms.educationform
FROM
	lessons
	INNER JOIN
	groupteachers
	ON
		lessons.idgroupteacher = groupteachers.idgroupteacher
	INNER JOIN
	teachers
	ON
		teachers.idteacher = groupteachers.idteacher
	INNER JOIN
	subjecthours
	ON
		groupteachers.idcurriculum = subjecthours.idcurriculum AND
        groupteachers.idsubjecthours = subjecthours.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
	INNER JOIN
	buildings
	ON
		classrooms.idbuilding = buildings.idbuilding
	INNER JOIN
	groupstudents
	ON
		groupteachers.idcurriculum = groupstudents.idcurriculum AND
        groupteachers.idgroup = groupstudents.idgroup
	INNER JOIN
	curriculum
	ON
		groupstudents.idcurriculum = curriculum.idcurriculum
	INNER JOIN
	specialities
	ON
		curriculum.idspeciality = specialities.idspeciality
	INNER JOIN
	educationforms
	ON
		curriculum.ideducationform = educationforms.ideducationform
WHERE
	surname = 'Иванов' AND
    `name` = 'Иван' AND
    middlename = 'Иванович'
ORDER BY
	teacher ASC,
	lessondate ASC,
	lessontime ASC
—------------------------
сведения о проведенных преподавателем занятиях за определенный период времени
—--------------------------------
SELECT
	CONCAT(teachers.surname, ' ', teachers.`name`, ' ', teachers.middlename) AS teacher,
	lessons.lessondate,
	lessons.lessontime,
	subjects.`subject`,
	lessontypes.lessontype,
	lessons.hours,
	groupstudents.groupnumber,
	specialities.speciality,
	curriculum.entranceyear,
	educationforms.educationform
FROM
	lessons
	INNER JOIN
	groupteachers
	ON
		lessons.idgroupteacher = groupteachers.idgroupteacher
	INNER JOIN
	teachers
	ON
		teachers.idteacher = groupteachers.idteacher
	INNER JOIN
	subjecthours
	ON
		groupteachers.idcurriculum = subjecthours.idcurriculum AND
        groupteachers.idsubjecthours = subjecthours.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
	INNER JOIN
	groupstudents
	ON
		groupteachers.idcurriculum = groupstudents.idcurriculum AND
        groupteachers.idgroup = groupstudents.idgroup
	INNER JOIN
	curriculum
	ON
		groupstudents.idcurriculum = curriculum.idcurriculum
	INNER JOIN
	specialities
	ON
		curriculum.idspeciality = specialities.idspeciality
	INNER JOIN
	educationforms
	ON
		curriculum.ideducationform = educationforms.ideducationform
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-06'
ORDER BY
	teacher ASC,
	lessondate ASC,
	lessontime ASC
—---------------------------------------------
информация для каждой группы об общем количестве часов по дисциплинам и видам занятий
------------------------------------------------

SELECT
	groupstudents.groupnumber,
	subjects.`subject`,
	lessontypes.lessontype,
	subjecthours.hours
FROM
	groupstudents
	INNER JOIN
	groupteachers
	ON
		groupstudents.idcurriculum = groupteachers.idcurriculum AND
        groupstudents.idgroup = groupteachers.idgroup
	INNER JOIN
	subjecthours
	ON
		groupteachers.idcurriculum = subjecthours.idcurriculum AND
        groupteachers.idsubjecthours = subjecthours.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
ORDER BY
	groupnumber ASC
—----------------------------------------------------------------------------
Общие итоги о количестве проведенных часов по дисциплинам и видам занятий за определенный период времени:
по группам
------------------------------------------------------------------------------

SELECT
	groupstudents.groupnumber,
	subjects.`subject`,
	lessontypes.lessontype,
	SUM(lessons.hours)
FROM
	groupstudents
	INNER JOIN
	groupteachers
	ON
		groupstudents.idcurriculum = groupteachers.idcurriculum AND
        groupstudents.idgroup = groupteachers.idgroup
	INNER JOIN
	subjecthours
	ON
		groupteachers.idcurriculum = subjecthours.idcurriculum AND
        groupteachers.idsubjecthours = subjecthours.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessons
	ON
		groupteachers.idgroupteacher = lessons.idgroupteacher
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
	INNER JOIN
	buildings
	ON
		classrooms.idbuilding = buildings.idbuilding
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-08'
GROUP BY groupstudents.groupnumber, lessontypes.lessontype, subjects.`subject`
ORDER BY groupstudents.groupnumber

----------------------------------------
по преподавателям
----------------------------------------
SELECT
	teachers.surname,
	subjects.`subject`,
	lessontypes.lessontype,
	SUM(lessons.hours)
FROM
	groupstudents
	INNER JOIN
	groupteachers
	ON
		groupstudents.idcurriculum = groupteachers.idcurriculum AND
		groupstudents.idgroup = groupteachers.idgroup
	INNER JOIN
	subjecthours
	ON
		groupteachers.idcurriculum = subjecthours.idcurriculum AND
		groupteachers.idsubjecthours = subjecthours.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessons
	ON
		groupteachers.idgroupteacher = lessons.idgroupteacher
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
	INNER JOIN
	buildings
	ON
		classrooms.idbuilding = buildings.idbuilding
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
	INNER JOIN
	teachers
	ON
		groupteachers.idteacher = teachers.idteacher
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-08'
GROUP BY
	lessontypes.lessontype,
	subjects.`subject`,
	teachers.surname
ORDER BY teachers.surname

--------------------------------------
по аудиториям
----------------------------------------
SELECT
	classrooms.classroomnumber,
	lessontypes.lessontype,
	subjects.`subject`,
	SUM(lessons.hours)
FROM
	lessons
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
	INNER JOIN
	subjecthours
	INNER JOIN
	groupteachers
	ON
		subjecthours.idcurriculum = groupteachers.idcurriculum AND
		lessons.idgroupteacher = groupteachers.idgroupteacher AND
		subjecthours.idsubjecthours = groupteachers.idsubjecthours
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	lessontypes
	ON
		subjecthours.idlessontype = lessontypes.idlessontype
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-08'
GROUP BY classrooms.classroomnumber,
	lessontypes.lessontype,
	subjects.`subject`
ORDER BY
	classrooms.classroomnumber
*/

