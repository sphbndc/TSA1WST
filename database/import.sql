
CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  is_archived TINYINT(1) NOT NULL DEFAULT 0,
  created_at DATETIME NOT NULL,
  INDEX idx_tasks_task_date (task_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Networking 2: SW 2', 'pending', '2026-10-01', '2026-09-29 08:00:00'),
('Networking 2: Formative 2', 'pending', '2026-10-01', '2026-09-29 08:00:00'),
('Networking 2: Technical Assessment 4', 'completed', '2026-10-01', '2026-09-29 08:00:00'),
('Networking 2: Technical Assessment 5', 'completed', '2026-10-01', '2026-09-29 08:00:00'),
('Networking 2: AI-Assisted Module 4-5', 'completed', '2026-10-01', '2026-09-29 08:00:00'),
('IT0035: Summative Assessment 1', 'completed', '2026-09-29', '2026-09-29 08:00:00'),
('IT0049: TSA1', 'pending', '2026-09-30', '2026-09-29 08:00:00'),
('Networking 2: Summative Assessment 2', 'pending', '2026-10-01', '2026-09-29 08:00:00'),
('IT0037: Title Proposal', 'pending', '2026-10-05', '2026-09-29 08:00:00'),
('Networking 2: CCST', 'pending', '2026-10-05', '2026-09-29 08:00:00');

INSERT INTO users (username, full_name, email, password, created_at) VALUES
('joseph', 'Joseph', 'joseph@example.com', '$2y$12$aypS1VhxDP0ny69soE3ZjuOPAgsZY.veQqG1gpd2OUJpScwP7XVf2', '2026-09-29 08:00:00');
