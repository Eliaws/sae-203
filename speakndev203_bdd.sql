-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-speakndev203.alwaysdata.net
-- Generation Time: Jun 12, 2023 at 10:25 PM
-- Server version: 10.6.11-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speakndev203_bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `auteur_id` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `chapo` longtext NOT NULL,
  `contenu` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `lien_yt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `auteur_id`, `titre`, `chapo`, `contenu`, `image`, `date_creation`, `lien_yt`) VALUES
(1, 2, ' Yona, Princesse de l\'Aube : Le joyau du shojo de ce siècle', 'Le monde du manga shojo est rempli de joyaux, mais il y a une série qui se démarque par son intrigue captivante, ses personnages mémorables et son traitement habile des thèmes universels. Yona, Princesse de l\'Aube est une véritable perle du genre, et voici pourquoi cette série est considérée comme le meilleur shojo de ce siècle.', 'Une histoire captivante qui captive les lecteurs :\r\n\r\nYona, Princesse de l\'Aube ne se contente pas d\'être une simple histoire d\'amour. Au cœur de cette série se trouve une intrigue profonde et complexe qui emmène les lecteurs dans un voyage épique. Suivant les pas de Yona, une princesse autrefois insouciante, nous sommes entraînés dans un monde fantastique où elle est confrontée à une tragédie qui change sa vie à jamais. Sa quête de justice et de rédemption, ainsi que sa recherche des légendaires dragons, font de cette histoire une véritable aventure captivante qui tient les lecteurs en haleine.\r\n\r\nDes personnages inoubliables et bien développés :\r\n\r\nYona, en tant qu\'héroïne, est une force à part entière. Son évolution tout au long de l\'histoire est remarquable, passant d\'une jeune fille fragile à une jeune femme forte et déterminée. Les autres personnages de la série sont tout aussi remarquables. Des dragons légendaires aux personnalités variées aux compagnons d\'aventure de Yona, chacun d\'entre eux apporte une profondeur et une complexité qui enrichissent l\'histoire. Leurs relations et interactions créent une dynamique fascinante et font ressortir le meilleur de chacun d\'entre eux.\r\n\r\nUne romance poignante qui touche le cœur des lecteurs :\r\n\r\nBien que l\'amour ne soit pas le seul moteur de l\'histoire, la romance entre Yona et Hak, son ami d\'enfance et protecteur dévoué, est un aspect central de la série. Leur relation est dépeinte avec une subtilité et une tendresse qui touchent le cœur des lecteurs. Au fur et à mesure que leur lien évolue, passant de l\'amitié à un amour profond, nous sommes témoins d\'une romance émouvante et sincère qui ajoute une dimension supplémentaire à l\'histoire.\r\n\r\nDes thèmes universels traités avec finesse :\r\n\r\nYona, Princesse de l\'Aube aborde des thèmes universels tels que la justice, l\'amitié, le deuil et le pardon. L\'histoire explore également les conflits sociaux et politiques, mettant en lumière les inégalités et les luttes de pouvoir. Cependant, ce qui distingue cette série, c\'est la manière subtile dont elle traite ces thèmes. Les lecteurs sont invités à réfléchir sur des questions importantes de la vie et de la société, ce qui donne une profondeur et une résonance supplémentaires à l\'histoire.\r\n\r\nUn travail artistique d\'une grande beauté :\r\n\r\nLes dessins de Mizuho Kusanagi sont un véritable régal visuel. Les paysages magnifiques, les costumes élaborés et les scènes d\'action bien chorégraphiées ajoutent une dimension esthétique exceptionnelle à la série. Chaque page est un véritable plaisir pour les yeux, renforçant l\'immersion des lecteurs dans l\'univers de Yona.\r\n\r\n\r\nYona, Princesse de l\'Aube est sans aucun doute le meilleur shojo de ce siècle. Avec son histoire captivante, ses personnages bien développés, sa romance touchante, ses thèmes universels et son travail artistique remarquable, cette série se distingue et laisse une empreinte indélébile dans le cœur des lecteurs. Si vous cherchez un shojo qui allie l\'aventure, l\'amour et la réflexion, ne cherchez pas plus loin que Yona, Princesse de l\'Aube. C\'est une œuvre d\'art qui mérite d\'être découverte et appréciée par tous les amoureux du genre.', 'https://gaak.fr/wp-content/uploads/2019/12/Fairy-Tail-15.jpg', '2023-06-03 20:51:50', 'https://youtu.be/BH0NuIGNN5w'),
(2, 8, ' Nana et Vivienne Westwood : Une Influence Révolutionnaire sur le Monde de la Mode', 'Nana et Vivienne Westwood, deux figures emblématiques de la scène artistique et de la mode, ont laissé une empreinte indélébile sur l\'industrie de la mode. Leur collaboration audacieuse et leur esthétique subversive ont non seulement repoussé les limites du style conventionnel, mais ont également profondément influencé la mode contemporaine. Cet article explore comment Nana et Vivienne Westwood ont réussi à redéfinir les normes de la mode, à insuffler une attitude rebelle et à encourager l\'expression individuelle dans un monde dominé par les conventions.', 'Nana et Vivienne Westwood ont réussi à influencer de manière significative le monde de la mode grâce à leur collaboration audacieuse et à leur esthétique subversive. Ensemble, ils ont redéfini les normes de la mode en introduisant des éléments de la culture punk, tels que les vêtements déstructurés, les motifs tartans et l\'androgynie. Leur travail a encouragé l\'expression individuelle, la rébellion et la remise en question des conventions établies, inspirant ainsi une génération de créateurs à repousser les limites de l\'esthétique et de la créativité. L\'héritage de Nana et Vivienne Westwood se perpétue dans la mode contemporaine, témoignant de leur impact durable sur l\'industrie et de leur capacité à changer les perceptions de la beauté et de la mode.', 'https://www.drcommodore.it/wp-content/uploads/2022/07/Immagine-2022-07-22-073142-1024x510.jpg', '2023-06-04 22:32:56', ''),
(3, 1, 'Kingdom : Le meilleur manga de ce siècle ?', 'Depuis sa première publication en 2006, Kingdom de Yasuhisa Hara a captivé des millions de lecteurs à travers le monde avec son récit épique de guerre, de politique et d\'ambition. Avec son style artistique unique, son scénario captivant et ses personnages inoubliables, Kingdom s\'est rapidement imposé comme l\'un des meilleurs mangas de ce siècle. Découvrez pourquoi cette série mérite toute votre attention.', 'Kingdom, créé par le mangaka talentueux Yasuhisa Hara, est une œuvre incontournable qui transcende les frontières du manga. Situé dans la période des Royaumes combattants en Chine, il relate l\'histoire d\'un jeune orphelin du nom de Xin, qui aspire à devenir le plus grand général de tous les temps. Accompagné de son ami d\'enfance, Piao, et rejoint par une multitude de personnages charismatiques, Xin s\'engage dans un voyage périlleux vers la grandeur, où les batailles épiques et les intrigues politiques se croisent pour créer une histoire inoubliable.\r\n\r\nCe qui rend Kingdom unique, c\'est son mélange parfait d\'histoire, d\'action et de développement de personnages. Yasuhisa Hara a fait un travail remarquable pour donner vie à la période des Royaumes combattants, en créant un univers riche et réaliste qui transporte les lecteurs dans un autre temps. Les scènes de bataille sont incroyablement bien dessinées, pleines de mouvement et d\'intensité, capturant l\'essence même de la guerre.\r\n\r\nEn ce qui concerne les personnages, Kingdom excelle dans la création de protagonistes complexes et attachants. Xin, le protagoniste principal, évolue tout au long de l\'histoire, passant d\'un jeune ambitieux à un chef de guerre mature. Les antagonistes sont tout aussi fascinants, avec des motivations profondes et des personnalités bien développées qui les rendent à la fois haïssables et compréhensibles.\r\n\r\nLe succès de Kingdom ne réside pas seulement dans son histoire captivante, mais aussi dans sa capacité à transmettre des messages profonds. Le manga explore des thèmes tels que le pouvoir, l\'amitié, l\'honneur et le sacrifice, tout en montrant les conséquences tragiques de la guerre. Les lecteurs sont invités à réfléchir sur les questions de justice et de moralité, et à remettre en question les notions traditionnelles de bien et de mal.\r\n\r\nEn conclusion, Kingdom est sans aucun doute l\'un des meilleurs mangas du 21e siècle. Avec son scénario captivant, ses personnages mémorables et ses illustrations époustouflantes, il captive les lecteurs dès la première page. Si vous êtes à la recherche d\'une aventure palpitante et émotionnelle, ne cherchez pas plus loin. Plongez dans le monde de Kingdom et laissez-vous emporter par son charme unique.', 'https://i.ytimg.com/vi/nQUAfjcthuA/maxresdefault.jpg', '2023-06-04 12:58:43', 'https://www.youtube.com/watch?v=GlmTux_r1F4'),
(4, 4, 'Les T-REX de retour sur Terre ?', ' L&eacute;once, le T-Rex qui a fait un retour spectaculaire sur Terre, intrigue les scientifiques et fascine le grand public.', 'Depuis des millions d&#039;ann&eacute;es, les Tyrannosaurus rex, ces impressionnants pr&eacute;dateurs du Cr&eacute;tac&eacute;, sont consid&eacute;r&eacute;s comme &eacute;teints. Cependant, l&#039;histoire a pris un tournant inattendu r&eacute;cemment avec la d&eacute;couverte de L&eacute;once, un T-Rex qui semble avoir r&eacute;ussi &agrave; revenir &agrave; la vie. Ce ph&eacute;nom&egrave;ne extraordinaire a suscit&eacute; l&#039;&eacute;tonnement et l&#039;int&eacute;r&ecirc;t des scientifiques du monde entier.\r\n\r\nL&eacute;once, nomm&eacute; ainsi par les chercheurs qui l&#039;ont d&eacute;couvert, a &eacute;t&eacute; rep&eacute;r&eacute; pour la premi&egrave;re fois dans une r&eacute;gion isol&eacute;e d&#039;une &icirc;le recul&eacute;e, o&ugrave; des fossiles de dinosaures &eacute;taient r&eacute;guli&egrave;rement mis au jour. Les pal&eacute;ontologues ont &eacute;t&eacute; stup&eacute;faits lorsqu&#039;ils ont constat&eacute; que L&eacute;once n&#039;&eacute;tait pas un simple squelette fossilis&eacute;, mais bien un T-Rex vivant et en mouvement.\r\n\r\nLes scientifiques ont imm&eacute;diatement entrepris des recherches approfondies pour comprendre comment un animal pr&eacute;historique pouvait r&eacute;appara&icirc;tre apr&egrave;s une extinction aussi lointaine. Les premi&egrave;res hypoth&egrave;ses sugg&egrave;rent que L&eacute;once aurait &eacute;t&eacute; pr&eacute;serv&eacute; dans un &eacute;tat de stase ou de cong&eacute;lation extr&ecirc;me pendant des millions d&#039;ann&eacute;es, avant de se r&eacute;veiller r&eacute;cemment.\r\n\r\nLes &eacute;tudes initiales ont r&eacute;v&eacute;l&eacute; que L&eacute;once pr&eacute;sentait des caract&eacute;ristiques similaires &agrave; celles des T-Rex fossiles connus. Il mesurait environ 12 m&egrave;tres de long et pesait pr&egrave;s de huit tonnes, avec une m&acirc;choire remplie de dents ac&eacute;r&eacute;es. Les scientifiques ont &eacute;galement not&eacute; des diff&eacute;rences subtiles, sugg&eacute;rant une &eacute;volution possible au cours des millions d&#039;ann&eacute;es pass&eacute;es dans cet &eacute;tat de conservation unique.\r\n\r\nLes motivations de L&eacute;once, son comportement et son alimentation ont &eacute;galement suscit&eacute; l&#039;int&eacute;r&ecirc;t des chercheurs. Les analyses des restes de proies d&eacute;couverts &agrave; proximit&eacute; ont montr&eacute; des traces de morsures caract&eacute;ristiques des T-Rex, confirmant que L&eacute;once &eacute;tait un carnivore redoutable. Cependant, certaines preuves laissent penser que L&eacute;once pourrait &eacute;galement se nourrir de v&eacute;g&eacute;taux, ce qui remettrait en question les croyances pr&eacute;c&eacute;dentes sur le r&eacute;gime alimentaire des T-Rex.\r\n\r\nOutre l&#039;int&eacute;r&ecirc;t scientifique, L&eacute;once a &eacute;galement captiv&eacute; l&#039;imagination du grand public. Des milliers de curieux se sont rendus sur l&#039;&icirc;le pour apercevoir de leurs propres yeux cet animal l&eacute;gendaire, provoquant un essor touristique sans pr&eacute;c&eacute;dent. Les autorit&eacute;s locales ont d&ucirc; mettre en place des mesures de s&eacute;curit&eacute; pour prot&eacute;ger les visiteurs et pr&eacute;server l&#039;int&eacute;grit&eacute; de l&#039;&eacute;cosyst&egrave;me de l&#039;&icirc;le.\r\n\r\nLe retour de L&eacute;once a &eacute;galement soulev&eacute; des questions &eacute;thiques et environnementales. Les scientifiques s&#039;interrogent sur les cons&eacute;quences potentielles de la pr&eacute;sence d&#039;un animal aussi pr&eacute;dateur dans un &eacute;cosyst&egrave;me contemporain. Des d&eacute;bats houleux ont &eacute;clat&eacute;, avec des arguments pour et contre la pr&eacute;servation de L&eacute;once et de son habitat.\r\n\r\nAlors que les &eacute;tudes se poursuivent, les scientifiques esp&egrave;rent percer les myst&egrave;res entourant la r&eacute;surrection de L&eacute;once et comprendre comment un T-Rex a pu r&eacute;appara&icirc;tre apr&egrave;s des millions d&#039;ann&eacute;es. Quelle que soit l&#039;issue de ces recherches, L&eacute;once restera &agrave; jamais une &eacute;nigme, une cr&eacute;ature hors du temps qui a boulevers&eacute; notre compr&eacute;hension de l&#039;histoire de la Terre et de ses habitants.', 'https://static.nationalgeographic.fr/files/styles/image_3200/public/01-trex-scotty_publicity_websize-credit-beth-zaiken.jpg?w=1600&amp;h=900', '2023-06-05 19:22:19', 'https://www.youtube.com/watch?v=pObF5l87LSY'),
(56, 6, 'L\'amitié improbable entre Caillou le chat roux et Anzar le chat tigré', 'Dans une petite rue paisible, une amitié unique est née entre deux félins au pelage singulier. Caillou, un chat roux à la personnalité espiègle, a rencontré Anzar, un majestueux chat tigré. Leur histoire d\'amitié a transcendé les différences et a illuminé leur quotidien de manière inattendue.', 'Caillou était un chaton joueur et curieux. Il explorait les recoins de la rue avec une innocence débordante. Un jour, alors qu\'il était sur le point de se lancer dans une aventure audacieuse, il aperçut Anzar, avec son pelage rayé, majestueux et plein de charme. Leur rencontre fut électrique. D\'abord méfiants, ils se sont observés avec curiosité avant de s\'approcher timidement l\'un de l\'autre.\r\n\r\nAu fil des jours, Caillou et Anzar ont développé une amitié profonde et sincère. Ils partageaient des moments de jeux endiablés, se couraient après et s\'entraidaient dans les situations délicates. Leurs propriétaires respectifs, étonnés par cette relation insolite, ne pouvaient que sourire devant la complicité qui s\'était instaurée entre les deux félins.\r\n\r\nCaillou et Anzar étaient différents en apparence, mais ils partageaient une même passion pour l\'exploration et l\'aventure. Ils étaient inséparables et leurs miaulements joyeux résonnaient dans la rue, créant une ambiance chaleureuse et réconfortante.\r\n\r\nL\'histoire de Caillou et Anzar rappelle que l\'amitié peut naître au-delà des apparences. Leur complicité est une leçon d\'ouverture d\'esprit et de tolérance. Ces deux petits félins ont montré qu\'il est possible de surmonter les différences et de forger des liens forts, apportant ainsi une lueur de bonheur dans leur univers félin.\r\nÀ mesure que leur amitié grandissait, Caillou et Anzar ont commencé à explorer ensemble des territoires inconnus. Ils escaladaient les arbres, découvraient de nouveaux jardins et se faufilaient à travers les hautes herbes. Leurs aventures étaient remplies de découvertes et de surprises.\r\n\r\nLorsque Caillou se retrouvait coincé dans un arbre, Anzar était là pour lui prêter main-forte avec agilité. Quand Anzar faisait face à des chiens errants, Caillou se mettait en première ligne, prêt à défendre son ami. Leur complicité était indestructible.\r\n\r\nLeur renommée dans la rue grandissait, et les gens s\'arrêtaient pour les observer avec admiration. Caillou et Anzar étaient devenus les héros de leur quartier, représentant l\'amitié sans barrières.\r\n\r\nAu fil des saisons, leur amitié était devenue un pilier de stabilité et de soutien mutuel. Ils partageaient des moments de paresse sous le soleil chaud de l\'été et se réchauffaient mutuellement près du feu en hiver.\r\n\r\nL\'histoire de Caillou et Anzar avait touché le cœur de nombreux habitants. Ils étaient devenus le symbole d\'une amitié au-delà des différences, rappelant à tous que l\'amour et l\'entraide n\'ont pas de frontières.\r\n\r\nAinsi, Caillou et Anzar continuent d\'écrire leur histoire, main dans la patte, prouvant chaque jour que la véritable amitié transcende les apparences et illumine nos vies de manière extraordinaire.\r\nMalheureusement, la belle amitié entre Caillou et Anzar prit une tournure inattendue lorsqu\'ils tombèrent amoureux de la même chatte, Olivia. Elle était une minette élégante et charismatique, dont la présence avait enflammé les cœurs des deux amis à fourrure.\r\n\r\nLa rivalité entre Caillou et Anzar commença à faire des ravages. Ce qui était autrefois une amitié solide se transforma en une bataille pour l\'attention et l\'affection d\'Olivia. Les jeux joyeux et les ronronnements complices furent remplacés par des grognements et des postures menaçantes.\r\n\r\nLe quartier était consterné de voir ces deux compagnons d\'autrefois s\'affronter si violemment. Les voisins tentèrent de les séparer, mais les deux chats étaient déterminés à conquérir le cœur d\'Olivia. La situation devenait de plus en plus tendue, et l\'amitié qui avait tant inspiré se transforma en animosité.\r\n\r\nFinalement, Caillou et Anzar se rendirent compte qu\'ils avaient perdu de vue ce qui était vraiment important : leur amitié. Ils mirent de côté leur querelle pour se retrouver et se réconcilier. Ensemble, ils décidèrent de laisser Olivia libre de choisir qui elle voulait dans sa vie.\r\n\r\nLeur amitié fut alors renouvelée, mais leur relation avec Olivia ne fut plus jamais la même. Ils apprirent la leçon précieuse que l\'amour et l\'amitié ne peuvent être forcés ni possédés. Ils choisirent de se concentrer sur leur lien solide et indéfectible, sachant que l\'amour véritable est celui qui transcende les querelles et les différends.\r\n\r\nAinsi, Caillou, Anzar et Olivia continuèrent leur chemin, chacun poursuivant son propre destin. Leur histoire resta gravée dans la mémoire du quartier, rappelant que les amitiés véritables peuvent être mises à l\'épreuve, mais qu\'elles survivent grâce à la compréhension, au pardon et à la valeur de l\'amour inconditionnel.', 'https://zupimages.net/up/23/24/95cm.png', '2023-06-12 21:39:56', ''),
(57, 3, 'Le circuit d\'espagne de Formule 1 un circuit bien ennuyeux', 'Le Circuit d\'Espagne, également connu sous le nom de Circuit de Catalunya, est considéré par certains amateurs de sport automobile comme étant un circuit ennuyeux en raison de plusieurs facteurs.', 'Tout d\'abord, le tracé du circuit est souvent critiqué pour son manque de dénivelé et de caractère distinctif. Il est principalement composé de virages moyennement rapides et de lignes droites relativement longues, ce qui limite les opportunités de dépassement et peut rendre les courses moins excitantes pour les spectateurs.\r\n\r\nDe plus, le Circuit de Catalunya est utilisé fréquemment pour les essais hivernaux de Formule 1, ce qui signifie que de nombreuses équipes et pilotes ont une connaissance approfondie du tracé. Cela conduit parfois à des courses prévisibles où les positions de départ sont souvent reflétées dans les résultats finaux.\r\n\r\nEn outre, le climat méditerranéen de la région peut rendre les courses sur ce circuit prévisibles. Les températures élevées et le manque de pluie lors de certaines courses peuvent entraîner une usure réduite des pneus et une stratégie de course moins variée, ce qui diminue l\'incertitude et l\'excitation sur la piste.\r\n\r\nIl est important de noter que l\'appréciation d\'un circuit peut varier d\'une personne à l\'autre. Certains fans de sport automobile peuvent apprécier les caractéristiques spécifiques du Circuit de Catalunya, tandis que d\'autres peuvent le trouver moins captivant par rapport à d\'autres circuits plus techniques et imprévisibles.\r\n\r\nvoici quelques autres points qui peuvent contribuer à considérer le Circuit d\'Espagne comme ennuyeux pour certains :\r\n\r\nLimites de dépassement : En raison du tracé relativement étroit du Circuit de Catalunya, il peut être difficile pour les pilotes de trouver des opportunités de dépassement. Les virages moyennement rapides et les sections étroites ne favorisent pas les manœuvres audacieuses, ce qui peut conduire à des courses où les positions restent relativement stables.\r\n\r\nManque de paysages spectaculaires : Contrairement à certains autres circuits qui offrent des paysages pittoresques ou des éléments distinctifs, le Circuit d\'Espagne est souvent considéré comme étant plutôt terne en termes de décors. Les spectateurs peuvent ressentir un manque de stimulation visuelle, ce qui peut contribuer à l\'impression d\'ennui.\r\n\r\nHistorique de courses peu animées : Au fil des années, le Circuit de Catalunya a accueilli plusieurs courses de Formule 1 et d\'autres compétitions où l\'action sur la piste a été limitée. Ces courses antérieures peuvent influencer l\'opinion des fans et créer une perception négative du circuit en termes d\'excitation et de spectacle.\r\n\r\nInfluence des tests préliminaires : Comme mentionné précédemment, le Circuit d\'Espagne est souvent utilisé pour les essais hivernaux de la Formule 1. Cela signifie que les équipes et les pilotes ont déjà une bonne compréhension du circuit avant même d\'y arriver pour la course. Cette familiarité peut réduire les surprises et les stratégies innovantes, contribuant ainsi à une expérience moins captivante pour les spectateurs.\r\n\r\nIl reste important de noter que ces critiques ne sont pas universellement partagées, et certaines personnes peuvent apprécier les spécificités du Circuit d\'Espagne. Les préférences en matière de circuits de course peuvent varier d\'une personne à l\'autre, et ce qui peut sembler ennuyeux pour certains peut être intéressant pour d\'autres.', 'https://zupimages.net/up/23/24/m6py.png', '2023-06-12 22:03:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `lien_twitter` varchar(255) NOT NULL,
  `lien_avatar` varchar(255) NOT NULL,
  `description` varchar(600) DEFAULT NULL,
  `lien_lk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`id`, `nom`, `prenom`, `lien_twitter`, `lien_avatar`, `description`, `lien_lk`) VALUES
(1, 'Ouabala', 'Elias', 'https://twitter.com', 'https://i.redd.it/6euh5uth2e261.jpg', 'Bonjour, Elias Ouabala, co-fondateur de l\'agence Hive. Je suis désormais membre à part entière de l\'équipe Speak\'n\'Dev et j\'ai toujours voulu réduire à néant les autres groupes de l\'intérieur mais je commence à me plaire dans ce TD2, on y est bien.', 'https://www.linkedin.com/in/elias-ouabala-215323256/'),
(2, 'Rebiai', 'Celia', 'https://twitter.com', 'https://www.mintandsoul.it/wp-content/uploads/C8DACE70-95A5-43A7-8655-3F43BB7AB385-599x600.jpeg', 'Je suis une fan inconditionnelle de The Weeknd depuis ses débuts. Sa voix unique, son style de chant envoûtant et ses paroles émotionnelles m\'ont immédiatement captivée. J\'admire sa capacité à se réinventer constamment et à repousser les limites de son art. Son travail acharné et sa détermination sont une source d\'inspiration pour moi. Le voir en concert et partager ces moments avec d\'autres fans sera une expérience inoubliable. The Weeknd a conquis mon cœur et je suis impatiente de voir ce que l\'avenir lui réserve.', 'https://www.linkedin.com/in/celia-rebiai-a20bb3221/'),
(3, 'Tauron', 'Yann', 'https://twitter.com', 'https://www.supersoluce.com/sites/default/files/node/207028/xenoblade-chronicles-2-lames-dromarch-001.png', 'Je suis un fan de Formule 1, et les sports automobiles sont ma passion. Mais en plus de cela, je suis aussi friand de jeux vidéo et de jeux de société. J\'aime jouer, me divertir et passer du bon temps avec mes amis de Speak\'n\'Dev.', 'https://www.linkedin.com/in/yann-tauron-05a792225/'),
(4, 'Vengadessin', 'Léonce', 'https://twitter.com', 'https://zupimages.net/up/23/23/32q6.png', 'Nan en vrai les frérot j\'suis pas le goat tout ça c\'est grâce à vous c’était le ballon d\'or du peuple j\'ai marqué les esprit de certaines personnes en rugissant dans les couloir avec mes 500 décibels grosse force a Émilie qu\'a été plus utile que moi en S2 je lui souhaite que du bon (pronostic : max 2 mois) on s\'pete a la rentré la dinausorenetté tchuss', 'https://www.linkedin.com/in/l%C3%A9once-vengadessin-9881b1220/'),
(6, 'Ravisankar', 'Shirel', 'https://www.mozilla.org/fr/privacy/firefox/', 'https://www.nautiljon.com/images/people/01/78/koya_bt21_143087.webp', 'J\'aime trop mon chat Caillou c\'est un peu tout en vrai, quand on me demande qu\'est-ce que j\'aime d\'autre je réponds \"les chats\" mais intérieurement je ne pense qu\'à Caillou.', 'https://www.linkedin.com/in/shirel-ravisankar-958376256/'),
(8, 'Tao', 'Emilie', 'https://twitter.com', 'https://zupimages.net/up/23/23/prlt.png', 'Hey je suis Emilie. Dans un avenir proche j\'espère avoir cumulé assez de connaissances et d\'expériences pour pouvoir réussir dans ma vie professionnelle. Je suis une personne curieuse et ouverte d\'esprit, je pense que c\'est ce qui fait ma force.', 'https://www.linkedin.com/in/emilie-tao-144432256/');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)',
  `reponse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `contenu`, `type`, `date_creation`, `reponse`) VALUES
(1, 'Martin', 'Thomas', 'm.thomas43@yopmail.com', 'Je suis intéressé par la formation.', 'etudiant', '2022-04-13 08:28:01', NULL),
(2, 'Despoux', 'Helena', 'h.despoux@foo.fr', 'Je suis intéressé par la formation.', 'etudiant', '2022-04-13 08:28:01', NULL),
(12, 'Ouabala', 'Elias', 'eliaxoua@gmail.com', 'Ceci est un &eacute;norme test en gros', 'etudiant', '2023-06-04 18:57:28', NULL),
(13, 'Vengadessin', 'L&eacute;once', 'vengadessin.leonce@gmail.com', 'Je suis le goat, il est vrai, dois-je prendre rendez-vous chez le m&eacute;decin pour abaisser mon niveau ?', 'parent', '2023-06-05 17:45:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_23A0E6660BB6FE6` (`auteur_id`);

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6660BB6FE6` FOREIGN KEY (`auteur_id`) REFERENCES `auteur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
