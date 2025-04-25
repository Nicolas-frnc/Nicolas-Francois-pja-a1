-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 25 avr. 2025 à 12:43
-- Version du serveur : 8.0.42
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id_book` int NOT NULL,
  `title` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `date_publication` date NOT NULL,
  `category_idcategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id_book`, `title`, `author`, `date_publication`, `category_idcategory`) VALUES
(1, '1984', 'George Orwell', '1949-06-08', 1),
(2, 'To Kill a Mockingbird', 'Harper Lee', '1960-07-11', 2),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', '1925-04-10', 1),
(4, 'Pride and Prejudice', 'Jane Austen', '1813-01-28', 3),
(5, 'Moby Dick', 'Herman Melville', '1851-10-18', 3),
(6, 'The Catcher in the Rye', 'J.D. Salinger', '1951-07-16', 2),
(7, 'Brave New World', 'Aldous Huxley', '1932-01-01', 1),
(8, 'Animal Farm', 'George Orwell', '1945-08-17', 1),
(9, 'The Hobbit', 'J.R.R. Tolkien', '1937-09-21', 4),
(10, 'Fahrenheit 451', 'Ray Bradbury', '1953-10-19', 1),
(11, 'Jane Eyre', 'Charlotte Brontë', '1847-10-16', 3),
(12, 'Wuthering Heights', 'Emily Brontë', '1847-12-01', 3),
(13, 'Les Misérables', 'Victor Hugo', '1862-04-03', 5),
(14, 'The Brothers Karamazov', 'Fyodor Dostoevsky', '1880-11-01', 5),
(15, 'Crime and Punishment', 'Fyodor Dostoevsky', '1866-01-01', 5),
(16, 'The Lord of the Rings', 'J.R.R. Tolkien', '1954-07-29', 4),
(17, 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', '1997-06-26', 4),
(18, 'Le Petit Prince', 'Antoine de Saint-Exupéry', '1943-04-06', 6),
(19, 'Don Quixote', 'Miguel de Cervantes', '1605-01-16', 5),
(20, 'The Divine Comedy', 'Dante Alighieri', '1320-01-01', 5),
(21, 'The Alchemist', 'Paulo Coelho', '1988-01-01', 6),
(22, 'One Hundred Years of Solitude', 'Gabriel García Márquez', '1967-05-30', 5),
(23, 'Dracula', 'Bram Stoker', '1897-05-26', 3),
(24, 'Frankenstein', 'Mary Shelley', '1818-01-01', 3),
(25, 'The Stranger', 'Albert Camus', '2001-06-01', 5),
(26, 'Lolita', 'Vladimir Nabokov', '1955-09-15', 2),
(27, 'The Picture of Dorian Gray', 'Oscar Wilde', '1890-07-20', 3),
(28, 'Ulysses', 'James Joyce', '1922-02-02', 2),
(29, 'A Tale of Two Cities', 'Charles Dickens', '2020-04-30', 3),
(30, 'The Count of Monte Cristo', 'Alexandre Dumas', '2015-08-28', 5);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idcategory` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcategory`, `name`, `description`) VALUES
(1, 'Science-Fiction', 'Romans d’anticipation, dystopies, univers futurs'),
(2, 'Contemporain', 'Littérature moderne post-1945'),
(3, 'Classique', 'Œuvres littéraires incontournables'),
(4, 'Fantasy', 'Univers imaginaires et magiques'),
(5, 'Littérature mondiale', 'Œuvres majeures de la littérature étrangère'),
(6, 'Philosophique', 'Romans à portée métaphysique ou morale');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `fk_book_category_idx` (`category_idcategory`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_category` FOREIGN KEY (`category_idcategory`) REFERENCES `category` (`idcategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
