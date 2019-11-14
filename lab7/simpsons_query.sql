SELECT grade
FROM grades, courses
WHERE id = course_id AND name = 'Computer Science 143';

SELECT name, grade
FROM students, grades
WHERE (grade LIKE 'A%' OR grade LIKE 'B%') AND id = student_id
    AND course_id IN (SELECT id FROM courses
                      WHERE name = 'Computer Science 143');

SELECT S.name, C.name, grade
FROM students S, courses C, grades
WHERE (grade LIKE 'A%' OR grade LIKE 'B%')
        AND S.id = student_id AND C.id = course_id;

SELECT name
FROM courses, grades
WHERE id = course_id
GROUP BY course_id
HAVING count(student_id) >= 2;
