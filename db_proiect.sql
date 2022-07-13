-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 23, 2022 la 02:28 PM
-- Versiune server: 10.4.22-MariaDB
-- Versiune PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `db_proiect`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cursuri`
--

CREATE TABLE `cursuri` (
  `id` int(20) NOT NULL,
  `denumire` varchar(20) NOT NULL,
  `descriere` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `cursuri`
--

INSERT INTO `cursuri` (`id`, `denumire`, `descriere`) VALUES
(25, 'Limba Engleza', 'Limba straina dezvolta creierul, creste performanta scolara, dezvolta capacitatea de a ramane atent, concentrat, ofera o noua viziune asupra lumii. La Scoala de Vara abordam in fiecare zi, in prima parte a zilei, Limba Engleza, intr-un mod avansat si atractiv, bazat pe activitati interactive intr-o atmosfera relaxanta si placuta. Fiecare copil va participa la activitati individuale, pe perechi, in grup, pentru dezvoltarea abilitatilor de comunicare. Imbinam jocul didactic, simulari situationale, fise de lucru, dezbateri orale, proiecte.'),
(28, 'Limba Franceza', 'Metoda Les Loustics 1 propune o deschidere culturalÄƒ È™i interdisciplinarÄƒ folosind documente autentice accesibile È™i diverse. Temele È™i documentele selecÈ›ionate sunt adecvate universului plin de energie È™i bucurie al copiilor: Bon appÃ©tit !, Vive lâ€™Ã©cole !, BientÃ´t les vacances, etc.'),
(29, 'Limba Germana', 'Cursul nostru extensiv de limba germanÄƒ are drept scop ridicarea gradului de competenÈ›Äƒ lingvisticÄƒ a copiilor, de la an la an È™i include dezvoltarea echilibratÄƒ a tuturor celor patru abilitÄƒÈ›i lingvistice de bazÄƒ: citit, ascultat, vorbit, scris.'),
(30, 'Dezvoltare Personala', 'Include:  Carti â€“ aceasta activitate presupune citirea unor carti ce ajuta la dezvoltarea personala a copiilor. Cititul contribuie la imbunatatirea memoriei, marirea plasticitatii creierului prin cresterea capacitatii de focalizare si atentie, ajuta la dezvoltarea imaginatiei si a creativitatii. Activitati de grup â€“ jocuri de cuvinte, de mima, jocurile copilariei noastre, vanatoare de comori, gradinarit, escape room, gastronomie (cum sa asezam masa, bunele maniere in timpul mesei, cum sa ne tratam musafirii, incercam impreuna retete simple). Puzzle-uri Jocul de Rol â€“ implica cunoastere, miscare, explorare, comunicare, socializare, observatie si imitatie, exercitiu, invatare si mai ales placere. Prin joc copiii descopera lumea si viata intr-o forma accesibila si atractiva, prelucrarea informatiei si transformarea ei in invatare, in experienta personala, ajuta la dezvoltarea propriei personalitati, la a se descoperi, ajuta la abilitatea comunicarii. Film â€“ dezvoltarea inteligente'),
(32, 'Matematica', 'Mate e fun ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `inregistrare`
--

CREATE TABLE `inregistrare` (
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `cnp` bigint(13) NOT NULL,
  `varsta` varchar(11) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `cursuri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `inregistrare`
--

INSERT INTO `inregistrare` (`nume`, `prenume`, `cnp`, `varsta`, `sex`, `cursuri`) VALUES
('h', 'Adrian', 6010412160011, '21', 'on', 'engleza franceza germana '),
('Pirvan', 'Corina', 1710213166734, '21', 'Feminin', 'franceza dezvoltare '),
('Pirvan', 'Corina', 6010412160011, '21', 'Feminin', 'engleza franceza germana '),
('Florescu', 'Alexandra', 6010412160011, '12', 'Feminin', 'engleza germana dezvoltare ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('administrator', 'admin123');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `noutati`
--

CREATE TABLE `noutati` (
  `id` int(20) NOT NULL,
  `noutate` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `noutati`
--

INSERT INTO `noutati` (`id`, `noutate`) VALUES
(1, 'Oferim programe educative accesibile si de inalta calitate pentru copiii din clasele primare si gimnaziale. Oferta educationala include suport in rezolvarea temelor scolare, activitati care stimuleaza curiozitatea si dorinta de invatare. Taxa include toate materialele didactice necesare fiecarei activitati!             Reducere de 10% pentru membri ai aceleasi familii.');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `cursuri`
--
ALTER TABLE `cursuri`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `noutati`
--
ALTER TABLE `noutati`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `cursuri`
--
ALTER TABLE `cursuri`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pentru tabele `noutati`
--
ALTER TABLE `noutati`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
