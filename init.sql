USE cykor;

CREATE TABLE userinfo (
    id VARCHAR(100),
    pw VARCHAR(100)
);

CREATE TABLE board (
    unid INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    writer VARCHAR(100),
    context VARCHAR(1000)
);

