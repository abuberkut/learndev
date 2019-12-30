-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 30 2019 г., 10:27
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `learndev_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `comment_link` varchar(255) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `reply_id`, `user_id`, `date`, `text`, `comment_link`, `like_count`, `dislike_count`) VALUES
(40, NULL, 6, '2019-12-16 09:35:27', 'Честно сказать мало чего нового в ваших уроках. Это скорее для новичков. Препод объясняет доходчиво, только непонятно.', '/lesson/2', 0, 0),
(41, NULL, 4, '2019-12-16 09:35:27', 'Акы чиба ки вай мегуфтай мо не!!\r\nЭ, Рахматло нунхари мерай?\r\nагане плт БТииьььииъммь?', '/news/1', 0, 0),
(57, NULL, 3, '2019-12-28 10:20:24', 'salom, cho kadi aka\n', '/news/1', 0, 0),
(61, NULL, 3, '2019-12-16 09:40:43', 'local and global vars versianing and also scripts', '/game/1', 0, 0),
(62, NULL, 4, '2019-12-18 20:05:12', 't oliyam dobivat nakadi ! )))) t hichi nameshai', '/news/1', 0, 0),
(63, NULL, 3, '2019-12-30 09:53:13', 'Ina bo yak commenti digar чсмлчдлывадывлажывдал', '/news/1', 0, 0),
(64, NULL, 3, '2019-12-29 11:52:42', 'What the Hell with your website!? There is not any news, even title, but the balnk page showed! I give you the one important advise - BE PROFESSIONAL! don\'t try to being fake!', '/news/3', 0, 0),
(65, NULL, 3, '2019-12-29 14:23:59', 'Texti shalaputski\n', '/lesson/12', 0, 0),
(66, NULL, 5, '2019-12-30 12:01:04', 'Excuse me, guys! How are you going!?', '/news/1', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `game_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`id`, `title`, `video_link`, `text`, `user_level_id`, `order`, `game_link`) VALUES
(1, 'The Tetris GAME!', '', 'This is one of the old school games which was created with a tiny opportunities and with the big enthusiasm. The creater of the game is Andrey Orlowsky who couldn\'t imagine that his word would be so famous.... ', 2, 1, '/template/games/tetris.php'),
(3, 'The Tetris', '/template/videos/tetris.mp4', 'This is one of the old school games which was created with a tiny opportunities and with the big enthusiasm. The creater of the game is Andrey Orlowsky who couldn\'t imagine that his word would be so famous.... ', 2, 2, '/template/games/tetris.php'),
(15, 'Arrays ', '/asdfasdf/asdfasdf', 'What kind of job do you want to get?', 4, 4, '');

-- --------------------------------------------------------

--
-- Структура таблицы `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `video_link`, `text`, `user_level_id`, `order`) VALUES
(1, 'Overview', '', 'There are tons  tutorials out there in the internet, but only some of them will be useful and cool for learning. \n\nHow do we start?\nTeaching as a learning process\nCourse parts\n...\n\n', 1, 1),
(2, 'The Basics', '', 'Computer\nVars\nTypes\nInitialization\nBoolean\nIf statements\nLoops\n...', 1, 2),
(12, 'Task force', '/asdfasdf/mp4', 'Overwhelming identifying and close to each other mighty Tyson', 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `like_type` int(11) NOT NULL,
  `like_link` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `like_type`
--

CREATE TABLE `like_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `like_type`
--

INSERT INTO `like_type` (`id`, `name`) VALUES
(0, 'disliked'),
(1, 'liked');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `short_content` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `like_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `short_content`, `category_id`, `like_count`, `dislike_count`, `date`) VALUES
(1, 'New students, welcome!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate et sunt atque repellat laudantium ducimus quibusdam ex minima explicabo incidunt cumque animi maiores nostrum blanditiis, corporis consequuntur, quas similique porro hic totam culpa, eos fugiat quos! Alias eum fuga dignissimos cupiditate illum ipsa aliquam iste sed voluptatum optio dolorem maiores dolore et architecto qui praesentium eligendi ad numquam, illo est, neque placeat vel necessitatibus. Et quaerat laboriosam molestiae qui veritatis sed officia autem consequatur necessitatibus blanditiis fuga, ducimus, sint quas cum dolorum maxime vel voluptate voluptatem expedita nisi atque. In, architecto ducimus. Similique fugiat natus, assumenda iste soluta consequuntur enim praesentium minus commodi illo rem repudiandae quidem pariatur optio id nam quis impedit porro cumque in, iusto cupiditate numquam. Facilis distinctio libero necessitatibus eveniet quas est, minus, sapiente perspiciatis sed pariatur expedita deleniti quibusdam omnis hic mollitia! Voluptates voluptatibus assumenda optio cumque error corporis, at perferendis est! Praesentium quisquam voluptatibus natus nemo accusantium quas, veritatis eaque vel, voluptatum in eos repudiandae. Soluta, quam. Aliquid error sequi excepturi commodi nam saepe odio eius assumenda amet natus voluptatibus magni culpa, minima aut, nemo, voluptas voluptates quia possimus beatae temporibus autem placeat porro! Libero perferendis incidunt odio. Odit, velit, totam. Totam rem, a magni! Quo alias, nisi consectetur officia nobis. Illo, vero libero nesciunt expedita eaque impedit pariatur debitis sapiente est recusandae veritatis quidem quo, mollitia aspernatur reprehenderit quia, ipsum non quod architecto. Unde expedita alias facilis beatae neque tempore aspernatur accusamus facere sapiente accusantium earum a, excepturi corrupti assumenda commodi magni dolor omnis sint ex impedit, ipsam amet ad laboriosam. Excepturi consequuntur at possimus voluptas minima, assumenda molestias nam vel eaque, cumque quisquam ea, laborum debitis deserunt repellendus magnam itaque unde, qui culpa reprehenderit perspiciatis. Veniam earum itaque fugiat veritatis amet enim at labore vitae similique dolorem facilis assumenda quam rem ullam iusto tempore error delectus, tempora adipisci iste, totam debitis nesciunt eum repellendus! Repellat tempora repellendus fuga. Officia commodi, fuga. Adipisci enim fuga praesentium neque illo cum maxime, modi soluta iure, commodi voluptate. Quibusdam facere quas neque expedita dolorum voluptatem quam aspernatur commodi iusto deleniti deserunt aliquam quis incidunt atque similique inventore iure veniam nulla nisi perspiciatis tenetur dolorem hic ab, eos quia. Dicta explicabo molestiae impedit rerum ratione voluptates, provident temporibus est rem fugiat laboriosam ipsum sit, minus beatae. Ipsa eveniet laboriosam accusamus corrupti labore numquam suscipit sint dolores magni obcaecati, ipsum aliquid facere placeat totam veniam! Consectetur sit, dolores adipisci molestiae molestias voluptate quam cumque at sequi dolorem, quisquam, culpa deleniti! Corrupti tenetur ab vitae tempora quos qui porro, repellendus assumenda. Odio ullam, blanditiis, porro dolor natus sequi autem aliquam tempore, error accusamus laboriosam quam similique, magnam rem. Voluptatibus nulla ipsam doloremque delectus nam soluta error consequatur, eaque expedita, voluptas, quisquam porro minus ex commodi quis. Et expedita ab animi, earum voluptatem nobis esse impedit reprehenderit iure at praesentium saepe quisquam id mollitia magnam tempora sunt, architecto! Quas veritatis eaque, assumenda at quo, repudiandae culpa itaque nulla porro perspiciatis quis explicabo illo necessitatibus accusamus nobis quia hic architecto ipsum.', 'Lorem ipsum dolor sit amet, co...', 1, 0, 0, '2019-10-27'),
(2, 'New students, welcome!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate et sunt atque repellat laudantium ducimus quibusdam ex minima explicabo incidunt cumque animi maiores nostrum blanditiis, corporis consequuntur, quas similique porro hic totam culpa, eos fugiat quos! Alias eum fuga dignissimos cupiditate illum ipsa aliquam iste sed voluptatum optio dolorem maiores dolore et architecto qui praesentium eligendi ad numquam, illo est, neque placeat vel necessitatibus. Et quaerat laboriosam molestiae qui veritatis sed officia autem consequatur necessitatibus blanditiis fuga, ducimus, sint quas cum dolorum maxime vel voluptate voluptatem expedita nisi atque. In, architecto ducimus. Similique fugiat natus, assumenda iste soluta consequuntur enim praesentium minus commodi illo rem repudiandae quidem pariatur optio id nam quis impedit porro cumque in, iusto cupiditate numquam. Facilis distinctio libero necessitatibus eveniet quas est, minus, sapiente perspiciatis sed pariatur expedita deleniti quibusdam omnis hic mollitia! Voluptates voluptatibus assumenda optio cumque error corporis, at perferendis est! Praesentium quisquam voluptatibus natus nemo accusantium quas, veritatis eaque vel, voluptatum in eos repudiandae. Soluta, quam. Aliquid error sequi excepturi commodi nam saepe odio eius assumenda amet natus voluptatibus magni culpa, minima aut, nemo, voluptas voluptates quia possimus beatae temporibus autem placeat porro! Libero perferendis incidunt odio. Odit, velit, totam. Totam rem, a magni! Quo alias, nisi consectetur officia nobis. Illo, vero libero nesciunt expedita eaque impedit pariatur debitis sapiente est recusandae veritatis quidem quo, mollitia aspernatur reprehenderit quia, ipsum non quod architecto. Unde expedita alias facilis beatae neque tempore aspernatur accusamus facere sapiente accusantium earum a, excepturi corrupti assumenda commodi magni dolor omnis sint ex impedit, ipsam amet ad laboriosam. Excepturi consequuntur at possimus voluptas minima, assumenda molestias nam vel eaque, cumque quisquam ea, laborum debitis deserunt repellendus magnam itaque unde, qui culpa reprehenderit perspiciatis. Veniam earum itaque fugiat veritatis amet enim at labore vitae similique dolorem facilis assumenda quam rem ullam iusto tempore error delectus, tempora adipisci iste, totam debitis nesciunt eum repellendus! Repellat tempora repellendus fuga. Officia commodi, fuga. Adipisci enim fuga praesentium neque illo cum maxime, modi soluta iure, commodi voluptate. Quibusdam facere quas neque expedita dolorum voluptatem quam aspernatur commodi iusto deleniti deserunt aliquam quis incidunt atque similique inventore iure veniam nulla nisi perspiciatis tenetur dolorem hic ab, eos quia. Dicta explicabo molestiae impedit rerum ratione voluptates, provident temporibus est rem fugiat laboriosam ipsum sit, minus beatae. Ipsa eveniet laboriosam accusamus corrupti labore numquam suscipit sint dolores magni obcaecati, ipsum aliquid facere placeat totam veniam! Consectetur sit, dolores adipisci molestiae molestias voluptate quam cumque at sequi dolorem, quisquam, culpa deleniti! Corrupti tenetur ab vitae tempora quos qui porro, repellendus assumenda. Odio ullam, blanditiis, porro dolor natus sequi autem aliquam tempore, error accusamus laboriosam quam similique, magnam rem. Voluptatibus nulla ipsam doloremque delectus nam soluta error consequatur, eaque expedita, voluptas, quisquam porro minus ex commodi quis. Et expedita ab animi, earum voluptatem nobis esse impedit reprehenderit iure at praesentium saepe quisquam id mollitia magnam tempora sunt, architecto! Quas veritatis eaque, assumenda at quo, repudiandae culpa itaque nulla porro perspiciatis quis explicabo illo necessitatibus accusamus nobis quia hic architecto ipsum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore praesentium dignissimos atque ad tempora excepturi sapiente dolor ab quo corrupti!', 1, 0, 0, '2019-10-27'),
(4, 'The oldest news of the world!', 'Three man tried to catch the grizly bear while it was sleeping in winter sleep. Unfortunately, when they aproached to it, the bear waked up and then kicked the asses of the men', 'Three man tried to catch the g...', 3, 0, 0, '2019-12-29');

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `name`) VALUES
(1, 'lesson'),
(2, 'game'),
(3, 'other');

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `question_type` int(11) NOT NULL,
  `question_category` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `text` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id`, `title`, `question_type`, `question_category`, `user_level`, `text`, `answer`) VALUES
(2, 'THE Title of the first question', 2, 1, 1, ';asdlfjasl;fjasdf;lasjfl;asdfjas;lfjasdfl;asdfj', 'sdlksjd');

-- --------------------------------------------------------

--
-- Структура таблицы `question_category`
--

CREATE TABLE `question_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question_category`
--

INSERT INTO `question_category` (`id`, `name`) VALUES
(2, 'game'),
(1, 'lesson');

-- --------------------------------------------------------

--
-- Структура таблицы `question_type`
--

CREATE TABLE `question_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `question_type`
--

INSERT INTO `question_type` (`id`, `name`) VALUES
(2, 'task'),
(1, 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `sign_up_date` date NOT NULL,
  `last_sign_in_date` date NOT NULL,
  `level_id` int(11) NOT NULL,
  `stars_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `status`, `login`, `password`, `sign_up_date`, `last_sign_in_date`, `level_id`, `stars_count`) VALUES
(3, 'Мирзоев Абубакр Шарафович', 1, 'abubakr', '111111', '2019-11-10', '2019-12-30', 1, 0),
(4, 'Хочи Акбар', 0, 'hojiakbar', '123456', '2019-11-10', '2019-12-18', 1, 0),
(5, 'Насимчон', 0, 'nass102', '111111', '2019-11-13', '2019-12-30', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `stars_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_level`
--

INSERT INTO `user_level` (`id`, `name`, `stars_count`) VALUES
(1, 'noob', 0),
(2, 'beginner', 50),
(3, 'junior', 100),
(4, 'middle', 200),
(5, 'professional', 400);

-- --------------------------------------------------------

--
-- Структура таблицы `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_status`
--

INSERT INTO `user_status` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'student');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `game_order` (`order`);

--
-- Индексы таблицы `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lesson_order` (`order`);

--
-- Индексы таблицы `like_type`
--
ALTER TABLE `like_type`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category`
--
ALTER TABLE `news_category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `question_category`
--
ALTER TABLE `question_category`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `question_type`
--
ALTER TABLE `question_type`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `question_category`
--
ALTER TABLE `question_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
