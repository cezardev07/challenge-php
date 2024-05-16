CREATE DATABASE data_news;

CREATE TABLE news(
  id serial primary key,
  title text not null,
  content text not null,
  category text not null
);

INSERT INTO news (title, content, category) VALUES (
  'Hello php',
  'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda, quidem fuga, id architecto hic itaque nesciunt asperiores quae voluptatem delectus nemo earum ad facere similique illo? In et at optio?',
  'php'
);

SELECT * FROM news ORDER BY id DESC;

SELECT * FROM news WHERE title ILIKE '%Php%';

DELETE FROM news WHERE id = 123;