SELECT * FROM roles WHERE movie_id = (SELECT id FROM movies WHERE name = 'pi');

SELECT first_name, last_name FROM actors, roles where id = actor_id and movie_id=(select id from movies where name = 'pi');

SELECT first_name, last_name FROM actors
WHERE id IN (SELECT actor_id FROM roles, movies
WHERE movie_id = id AND name = 'Kill Bill: Vol. 1')
AND id IN (SELECT actor_id FROM roles, movies
WHERE movie_id = id AND name = 'Kill Bill: Vol. 2');

SELECT first_name, last_name, count(movie_id)
FROM actors, roles
WHERE id = actor_id
GROUP BY actor_id
ORDER BY count(movie_id) DESC LIMIT 7;

SELECT genre
FROM movies_genres
GROUP BY genre
ORDER BY count(movie_id) DESC LIMIT 3;


SELECT first_name, last_name
FROM directors, movies_directors D, movies_genres G
WHERE id = D.director_id AND D.movie_id = G.movie_id AND genre = 'Thriller'
GROUP BY director_id
ORDER BY count(director_id) DESC LIMIT 1;
