-- Insert sample users
INSERT INTO users (username, password_hash) VALUES
('testuser', '$2y$10$7YJr8ZyWxzjqw1zZIrVfJOWOZ3IbXX9zj9GmQRy.7pQX9SCM2FF.G'); -- password: testpassword

-- Insert sample tasks for the test user
INSERT INTO tasks (user_id, title, description, category, due_date, status) VALUES
(1, 'Buy groceries', 'Milk, Bread, Eggs', 'Personal', '2024-09-01', 'Pending'),
(1, 'Work on project', 'Finish the report', 'Work', '2024-09-05', 'In Progress');
