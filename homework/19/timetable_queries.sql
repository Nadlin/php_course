
/*
Преподаватели, у которых накладки '2020-05-04'
*/
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