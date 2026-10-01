ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL DEFAULT '';
ALTER TABLE tasks ADD COLUMN is_archived TINYINT(1) NOT NULL DEFAULT 0;
UPDATE users SET password = '$2y$12$aypS1VhxDP0ny69soE3ZjuOPAgsZY.veQqG1gpd2OUJpScwP7XVf2' WHERE username = 'joseph';
