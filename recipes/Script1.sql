-- Write your own SQL object definition here, and it'll be included in your package.
CREATE TABLE [dbo].[recipes]
(
    id INT PRIMARY KEY IDENTITY(1,1),
    created_at DATETIME DEFAULT GETDATE(),
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    people INT NOT NULL,
    preparation_time INT NOT NULL
);
