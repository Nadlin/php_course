
/*
 --------------------------------------
 расписание занятий конкретной группы:
---------------------------------------
*/
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
	groupnumber,
	lessondate,
	lessontime

/*
-------------------------------
Расписание занятий конкретного преподавателя
------------------------------
*/
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
	teacher,
	lessondate,
	lessontime

/*
—------------------------
сведения о проведенных преподавателем занятиях за определенный период времени
—--------------------------------
*/
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
	teacher,
	lessondate,
	lessontime

/*
—---------------------------------------------
информация для каждой группы об общем количестве часов по дисциплинам и видам занятий
------------------------------------------------
*/

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
	groupnumber

/*
—----------------------------------------------------------------------------
Общие итоги о количестве проведенных часов по дисциплинам и видам занятий за определенный период времени:
по группам
------------------------------------------------------------------------------
*/

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
GROUP BY
    groupstudents.groupnumber,
    lessontypes.lessontype,
    subjects.`subject`
ORDER BY
    groupstudents.groupnumber

/*
----------------------------------------
по преподавателям
----------------------------------------
*/
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
ORDER BY
    teachers.surname

/*
--------------------------------------
по аудиториям
----------------------------------------
*/
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
GROUP BY
    classrooms.classroomnumber,
	lessontypes.lessontype,
	subjects.`subject`
ORDER BY
	classrooms.classroomnumber

/*
----------------------------
----------------------------
*/
/*SELECT
	classrooms.classroomnumber,
	lessons.lessondate,
	SUM(lessons.hours)
FROM
	lessons
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-08'
GROUP BY classrooms.classroomnumber, lessons.lessondate*/

/*
------------------------------------------------------
Среднее количество часов занятий в день по аудиториям за определенный период времени
-------------------------------------------------------
*/
SELECT
	classrooms.classroomnumber,
	SUM(lessons.hours)/(DATEDIFF('2020-05-08', '2020-05-04')+1)
FROM
	lessons
	INNER JOIN
	classrooms
	ON
		lessons.idclassroom = classrooms.idclassroom
WHERE lessondate BETWEEN '2020-05-04' AND '2020-05-08'
GROUP BY
    classrooms.classroomnumber
ORDER BY
    classrooms.classroomnumber

/*
--------------------------------------
--------------------------------------
*/
/*SELECT
	lessons.lessondate,
	groupstudents.groupnumber,
	SUM(lessons.hours)
FROM
	lessons
	INNER JOIN
	groupteachers
	ON
		lessons.idgroupteacher = groupteachers.idgroupteacher
	INNER JOIN
	groupstudents
	ON
		groupteachers.idcurriculum = groupstudents.idcurriculum AND
		groupteachers.idgroup = groupstudents.idgroup
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-08'
GROUP BY
	groupstudents.groupnumber,
	lessons.lessondate
*/

/*
---------------------------------
Средняя загрузка студентов в день за определенный период времени
----------------------------------
*/
SELECT
	groupstudents.groupnumber,
	SUM(lessons.hours)/(DATEDIFF('2020-05-07', '2020-05-04')+1)
FROM
	lessons
	INNER JOIN
	groupteachers
	ON
		lessons.idgroupteacher = groupteachers.idgroupteacher
	INNER JOIN
	groupstudents
	ON
		groupteachers.idcurriculum = groupstudents.idcurriculum AND
		groupteachers.idgroup = groupstudents.idgroup
WHERE
	lessondate BETWEEN '2020-05-04' AND '2020-05-07'
GROUP BY
	groupstudents.groupnumber

/*
--------------------------------------
--------------------------------------
*/
/*SELECT
	groupstudents.groupnumber,
	lessontypes.lessontype,
	subjecthours.hours,
	subjects.`subject`,
	lessons.hours,
	lessons.lessondate
FROM
	lessontypes
	INNER JOIN
	subjecthours
	ON
		lessontypes.idlessontype = subjecthours.idlessontype
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	groupteachers
	ON
		subjecthours.idcurriculum = groupteachers.idcurriculum AND
		subjecthours.idsubjecthours = groupteachers.idsubjecthours
	INNER JOIN
	groupstudents
	ON
		groupteachers.idcurriculum = groupstudents.idcurriculum AND
		groupteachers.idgroup = groupstudents.idgroup
	LEFT JOIN
	lessons
	ON
		groupteachers.idgroupteacher = lessons.idgroupteacher
ORDER BY
	groupstudents.groupnumber ASC
*/

/*
---------------------------------
Информация об остатке часов по дисциплинам и видам занятий (общее количество часов минус количество часов занятий в расписании)
----------------------------------
*/
SELECT
	groupstudents.groupnumber,
	subjects.`subject`,
	lessontypes.lessontype,
	subjecthours.hours,
	SUM(lessons.hours) as spent_hours,
	subjecthours.hours - IF(SUM(lessons.hours), SUM(lessons.hours), 0) as remaining_hours
FROM
	lessontypes
	INNER JOIN
	subjecthours
	ON
		lessontypes.idlessontype = subjecthours.idlessontype
	INNER JOIN
	subjects
	ON
		subjecthours.idsubject = subjects.idsubject
	INNER JOIN
	groupteachers
	ON
		subjecthours.idcurriculum = groupteachers.idcurriculum AND
		subjecthours.idsubjecthours = groupteachers.idsubjecthours
	INNER JOIN
	groupstudents
	ON
		groupteachers.idcurriculum = groupstudents.idcurriculum AND
		groupteachers.idgroup = groupstudents.idgroup
	LEFT JOIN
	lessons
	ON
		groupteachers.idgroupteacher = lessons.idgroupteacher
GROUP BY
    groupstudents.groupnumber,
    subjects.`subject`,
    lessontypes.lessontype,
    subjecthours.hours
ORDER BY
	groupstudents.groupnumber
--------------

SELECT
	lessons1.lessondate,
	lessons1.lessontime,
	groupteachers1.idteacher,
	subjects1.`subject`,
	les2.lessondate,
	les2.lessontime,
	les2.`subject`,
	les2.idteacher
FROM
	lessons AS lessons1
	INNER JOIN
	groupteachers as groupteachers1
	ON
		lessons1.idgroupteacher = groupteachers1.idgroupteacher
	INNER JOIN
	subjecthours as subjecthours1
	ON
		groupteachers1.idcurriculum = subjecthours1.idcurriculum AND
		groupteachers1.idsubjecthours = subjecthours1.idsubjecthours
	INNER JOIN
	subjects as subjects1
	ON
		subjecthours1.idsubject = subjects1.idsubject
	INNER JOIN
	(SELECT lessons2.lessondate, lessons2.lessontime, groupteachers2.idgroupteacher, subjects2.`subject`, groupteachers2.idteacher
	 FROM lessons AS lessons2
	 INNER JOIN
		groupteachers as groupteachers2
		ON
			lessons2.idgroupteacher = groupteachers2.idgroupteacher
		INNER JOIN
		subjecthours as subjecthours2
		ON
		groupteachers2.idcurriculum = subjecthours2.idcurriculum AND
		groupteachers2.idsubjecthours = subjecthours2.idsubjecthours
		INNER JOIN
		subjects as subjects2
		ON
			subjecthours2.idsubject = subjects2.idsubject) les2
	ON
		lessons1.lessondate = les2.lessondate AND groupteachers1.idteacher = les2.idteacher
WHERE
	lessons1.lessondate = '2020-05-04'
ORDER BY groupteachers1.idteacher


SELECT
	lessons1.lessondate,
	lessons1.lessontime,
	groupteachers1.idteacher,
	subjects1.`subject`,
	groupstudents1.groupnumber,
	les2.lessondate,
	les2.lessontime,
	les2.`subject`,
	les2.idteacher,
	les2.groupnumber
FROM
	lessons AS lessons1
	INNER JOIN
	groupteachers AS groupteachers1
	ON
		lessons1.idgroupteacher = groupteachers1.idgroupteacher
	INNER JOIN
	subjecthours AS subjecthours1
	ON
		groupteachers1.idcurriculum = subjecthours1.idcurriculum AND
		groupteachers1.idsubjecthours = subjecthours1.idsubjecthours
	INNER JOIN
	subjects AS subjects1
	ON
		subjecthours1.idsubject = subjects1.idsubject
	INNER JOIN
	groupstudents as groupstudents1
	ON
		groupteachers1.idcurriculum = groupstudents1.idcurriculum AND
		groupteachers1.idgroup = groupstudents1.idgroup
	INNER JOIN
	(
		SELECT
			lessons2.lessondate,
			lessons2.lessontime,
			groupteachers2.idgroupteacher,
			subjects2.`subject`,
			groupteachers2.idteacher,
			groupstudents2.groupnumber
		FROM
			lessons AS lessons2
			INNER JOIN
			groupteachers AS groupteachers2
			ON
				lessons2.idgroupteacher = groupteachers2.idgroupteacher
			INNER JOIN
			subjecthours AS subjecthours2
			ON
				groupteachers2.idcurriculum = subjecthours2.idcurriculum AND
				groupteachers2.idsubjecthours = subjecthours2.idsubjecthours
			INNER JOIN
			subjects AS subjects2
			ON
				subjecthours2.idsubject = subjects2.idsubject
			INNER JOIN
			groupstudents as groupstudents2
			ON
				groupteachers2.idcurriculum = groupstudents2.idcurriculum AND
				groupteachers2.idgroup = groupstudents2.idgroup
			) AS les2
	ON
		lessons1.lessondate = les2.lessondate AND
		groupteachers1.idteacher = les2.idteacher
WHERE
	lessons1.lessondate = '2020-05-04'
ORDER BY
	groupteachers1.idteacher ASC


	SELECT
	lessons1.lessondate,
	lessons1.lessontime,
	groupteachers1.idteacher,
	subjects1.`subject`,
	groupstudents1.groupnumber,
	les2.lessondate,
	les2.lessontime,
	les2.`subject`,
	les2.idteacher,
	les2.groupnumber
FROM
	lessons AS lessons1
	INNER JOIN
	groupteachers AS groupteachers1
	ON
		lessons1.idgroupteacher = groupteachers1.idgroupteacher
	INNER JOIN
	subjecthours AS subjecthours1
	ON
		groupteachers1.idcurriculum = subjecthours1.idcurriculum AND
		groupteachers1.idsubjecthours = subjecthours1.idsubjecthours
	INNER JOIN
	subjects AS subjects1
	ON
		subjecthours1.idsubject = subjects1.idsubject
	INNER JOIN
	groupstudents as groupstudents1
	ON
		groupteachers1.idcurriculum = groupstudents1.idcurriculum AND
		groupteachers1.idgroup = groupstudents1.idgroup
	INNER JOIN
	(
		SELECT
			lessons2.lessondate,
			lessons2.lessontime,
			groupteachers2.idgroupteacher,
			subjects2.`subject`,
			groupteachers2.idteacher,
			groupstudents2.groupnumber
		FROM
			lessons AS lessons2
			INNER JOIN
			groupteachers AS groupteachers2
			ON
				lessons2.idgroupteacher = groupteachers2.idgroupteacher
			INNER JOIN
			subjecthours AS subjecthours2
			ON
				groupteachers2.idcurriculum = subjecthours2.idcurriculum AND
				groupteachers2.idsubjecthours = subjecthours2.idsubjecthours
			INNER JOIN
			subjects AS subjects2
			ON
				subjecthours2.idsubject = subjects2.idsubject
			INNER JOIN
			groupstudents as groupstudents2
			ON
				groupteachers2.idcurriculum = groupstudents2.idcurriculum AND
				groupteachers2.idgroup = groupstudents2.idgroup
			) AS les2
	ON
		lessons1.lessondate = les2.lessondate AND
		groupteachers1.idteacher = les2.idteacher
WHERE
	lessons1.lessondate = '2020-05-04' AND lessons1.lessontime = les2.lessontime AND groupstudents1.groupnumber != les2.groupnumber AND subjects1.`subject` != les2.`subject`
ORDER BY
	groupteachers1.idteacher ASC

