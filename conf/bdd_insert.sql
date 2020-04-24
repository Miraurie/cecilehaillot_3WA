
-- On ajoute le contenu dans la table cours
INSERT INTO `cours`(
    `id`,
    `city`,
    `adress`,
    `day`,
    `hour_1`,
    `hour_2`,
    `hour_3`,
    `info`,
    `text_card`,
    `id_img`
)
VALUES(
    0,
    'Brains',
    'Salle du Mortier Jean-Noël Prin 7 rue Jules-Verne',
    'Mardi',
    0,
    1,
    2,
    'Cours de country line dance\r\nSur de la musique country, mais aussi des musiques actuelles...\r\nOuverte à tous, à partir de 9 ans et en tout cas tant que la condition physique le permet. C\'est souvent une activité qui se pratique en famille, il n\'est pas rare d\'y voir grands-parents, parents, ados et enfants dans un même cours.\r\nReprise des cours le deuxième mardi de septembre\r\nInformation et inscriptions sur place, par téléphone au 06 88 22 38 70 ou par mail : cecile.haillot44@gmail.com\r\nVous pouvez assister gratuitement et sans engagement a un ou deux cours d’essai.',
    'Le Mardi à la salle du Mortier à Brains : 18h30 débutant loisir et  confirmé ',
    3
),(
    1,
    'Pornic',
    'Ma Salle de Sport Decathlon 10 Rue Jean Monnet, en face du restaurent Le Royal et Lidl',
    'Jeudi',
    3,
    NULL,
    NULL,
    'Cours de country line dance\r\nSur de la musique country, mais aussi des musiques actuelles...\r\nOuverte à tous, à partir de 9 ans et en tout cas tant que la condition physique le permet.\r\nReprise des cours le deuxième jeudi de septembre\r\nInformation et inscriptions sur place, par téléphone au 06 88 22 38 70 ou par mail : cecile.haillot44@gmail.com\r\nVous pouvez assister gratuitement et sans engagement a un ou deux cours d’essai.',
    'Le Jeudi à la salle de sport Decathlon à Pornic :14h30, débutant',
    1
),(
    2,
    'La Plaine sur Mer',
    'Salle de Loisirs, rue de Préfailles, a coté des Ateliers Municipaux, face a l’école Notre Dame',
    'Jeudi',
    4,
    5,
    NULL,
    'Cours de country line dance\r\nSur de la musique country, mais aussi des musiques actuelles...\r\nOuverte à tous, à partir de 9 ans et en tout cas tant que la condition physique le permet. C\'est souvent une activité qui se pratique en famille, il n\'est pas rare d\'y voir grands-parents, parents, ados et enfants dans un même cours.\r\nReprise des cours la semaine du 15 septembre\r\nInformation et inscriptions sur place, par téléphone au 06 88 22 38 70 ou par mail : cecile.haillot44@gmail.com\r\nVous pouvez assister gratuitement et sans engagement a un ou deux cours d’essai.',
    'Le Jeudi à Salle de Loisirs à La Plaine sur Mer : 19h débutant, novice et intermédiaire',
    2
);

-- On ajoute le contenu dans la table faq
INSERT INTO `faq`(`id`, `question`, `answer`, `id_img`)
VALUES(0,'La country line dance, c\'est quoi?','Ce n’est pas une danse mais plutôt une manière d’exécuter divers styles de danses sociales. Elle se pratique sans partenaire et est chorégraphiée. C’est une séquence de pas répétée un certain nombre de fois à l’identique par un groupe de danseurs placés sur une ou plusieurs lignes. Chacun participe à l’harmonie de l’ensemble dans une sorte d’osmose émotionnelle. Elle se réalise sur des genres musicaux divers, des musiques issues de la country, mais aussi sur des musiques actuelles.\r\nC’est avant tout une activité de divertissement, de loisir et de détente. Elle se pratique seule mais avec les autres.',NULL),
(
    1,
    'C\'est pour qui ?',
    'La danse country est ouverte à tous, à partir de 8 ans et en tout cas tant que la condition physique le permet. C’est souvent une activité qui se pratique en famille, il n’est pas rare d’y voir grands-parents, parents, ados et enfants dans un même cours.',
    9
),(
    2,
    'Comment se passent les cours ?',
    'Le cours dure une heure, on apprend une nouvelle chorégraphie plus ou moins toutes les semaines. La chorégraphie est expliquée en détail et les figures sont expliquées pas à pas.\r\nIl y a 3 niveaux d’apprentissage :\r\nLe niveau débutant s’adresse à des personnes qui n’ont jamais fait de country auparavant. Des chorégraphies simples permettent d’acquérir des pas de base et procurent rapidement du plaisir à danser. Tout le monde y arrive, même les pieds gauches, ceux qui « ne savent pas danser » le rythme d’apprentissage varie selon les personnes et les groupes.\r\nLe niveau novice est réservé à ceux qui ont acquis les pas de base, mais sont encore débutants.\r\nLe niveau intermédiaire et avancé s’adresse à des danseurs confirmés pour qui la nomenclature de pas et les techniques de base n’ont plus aucun secret.\r\nLes week-ends, il y a des bals organisés dans toute la région où on peut se faire plaisir et danser.',
    NULL
),(
    3,
    'Est-ce difficile d’apprendre ?',
    'Non puisqu’il y a une progression dans les apprentissages. Une présence régulière est indispensable pour les mêmes raisons.',
    NULL
),(
    4,
    'Si je n’aime pas la musique country ?',
    'Certains viennent au cours de country parce qu’ils sont attirés par l’histoire, la culture, les codes vestimentaires et la musique américaine. D’autres l’adorent parce que c’est une activité en vogue et une forme d’exercice physique comme une autre. Les passionnés écoutent régulièrement ce genre de musique et les autres qui la découvrent l’apprécient en général instantanément. Ils s’étonnent souvent de la connaître « ah, mais je l’ai déjà entendu, mais je ne savais pas que c’était de la country ! ». On danse également sur des musiques actuelles qui passent sur toutes les radios. Dans tous les cas, les musiques sont tellement variés que tout le monde s’y retrouve.',
    NULL
),(
    5,
    'Faut-il venir en jean, santiags et chapeau de cowboy ?',
    'Absolument pas ! La seule contrainte se trouve dans les chaussures. Bien évidemment, on peut venir avec des bottes, mais le prix est très élevé. On peut également utiliser des chaussures de danse de jazz. Le principal c’est qu’elles soient bien fermées (pas de sandales, de Tongue ou des claquettes) et que le talon ne dépasse pas 4cm (pas de talons aiguilles, trop dangereux pour les chevilles). Des chaussures de villes c’est très bien.',
    8
),(
    6,
    'Qui est Cécile Haillot ?',
    'Cécile Haillot. J’ai commencé à apprendre la danse country en Ile de France il y a près de 20 ans, par hasard. Un cours s’est ouvert à la suite du cours de gym auquel j’assistais, alors mes copines m’y ont entraîné. Je n’étais pas passionnée par la culture western, je ne rêvais pas de vivre aux USA et je n’écoutais pas de la country auparavant. J’étais plutôt branchée rock et hard-rock. Je suis devenue animatrice par hasard même s’il n’y a pas de hasard dans la vie. notre « prof » nous avait lâché et je me suis lancée pour éviter la fermeture du cours. J’ai adoré et j’ai fait des formations. Danser pour soi est une chose, apprendre aux autres demande d’autres compétences que j’ai acquises sur le tas et en suivant des stages pour animateurs.\r\n\r\nJ’ai donnée et je donne des cours essentiellement dans le pays de Retz, Frossay, St Brevin, La Plaine sur Mer et Brains.\r\n\r\nCe qui me plaît le plus : la convivialité, la bonne entente, l’entraide, la solidarité de tous face aux apprentissages, le partage entre animateurs, la bonne ambiance des soirées, le fait que personne n’est jamais seul dans ces soirées et qu’il y a un très grand respect, une mixité des âges et des milieux sociaux culturels. Quand on vient à la country, on n’est plus médecin, avocat, politicien, ouvrier ou agriculteur, on est juste danseur ! On ne connaît même pas ce que font les gens dans la vie et c’est très bien. On peut être doué et avoir une grande expérience de la danse en général ou n’avoir aucune oreille, deux pieds gauches, ne pas faire la différence entre sa droite et sa gauche mais tout le monde trouve sa place !\r\n\r\nJe dis un grand merci à Jean Pierre Duval, mon premier « prof » de country, à l’APEV puis a l\'ASD de Drancy, qui m’a fait aimer cette danse et qui aurait sans doute bien rit si on lui avait dit à l’époque que je donnerais des cours…. Je faisais partie de ceux qui ne comprenaient rien et qui se retrouvaient à l’envers, qui partaient à droite alors que tout le monde partait à gauche….\r\nÉgalement à Adeline Dubernard, qui a été mon modèle pendant quelques années à SSDC d’Argenteuil...\r\nEt tout particulièrement à Yann Chauveau, mon co-animateur et ami, celui avec qui j’ai partagé mes premières galères de danseuse d’abord, puis d’animateur à l’ASD, mes premières formations, et que j’ai abandonné pour venir en Loire Atlantique...\r\n\r\nEt à tous mes élèves, passés, présents et futurs, qui me supportent toutes les semaines... Ce n’est que du bonheur, partagé, je l’espère...',
    7
),(
    7,
    'Je souhaite de devenir animateur, ou je donne des cours et voudrais de l\'aide, une formation ou du soutien',
    'Je vous propose un parrainage sur une année, un suivi personnalisé complet en danse, musique, technique, pédagogie et de vous accompagner dans vos premiers pas.\r\nContactez-moi par mail ou par téléphone pour plus d’informations',
    NULL
),(
    8,
    '« La rumeur c’est trop cool, j’apprends des trucs sur moi que je ne savais même pas ! »',
    '« La rumeur, cette vérité qui se promène de bouche  à oreille comme un mensonge, créés par des jaloux, produit de l\'imagination des gens vulgaires,  qui ne fait pas réfléchir les gens, qui est créé par des curieux et répétés par des imbéciles, qui passe comme un soupir au dessous du vent, qui sont  souvent révélatrices ! Quand on les ignore, elles ne sont plus que de la boue à la surface d\'une rivière. Elles ne tardent pas à disparaître.\r\nQuand le mensonge prend l’ascenseur, la vérité prend l’escalier, elle met plus de temps mais elle finit toujours par arriver !\r\nSi ce que tu as à dire n’est pas plus beau que le silence alors tais-toi ! »',
    NULL
);
 
-- On ajoute le contenu dans la table files
INSERT INTO `files`(`id`, `title`, `extension`, `id_page`)
VALUES(0, 'reveillon_2019', 'pdf', 2);
 
-- On ajoute le contenu dans la table images
INSERT INTO `images`(
    `id`,
    `name`,
    `extension`,
    `alt`,
    `id_page`
)
VALUES(
    0,
    'test',
    'jpg',
    'Placeholder pour le test dans une page de cours',
    1
),(
    1,
    'salle_de_sport_decat',
    'jpg',
    'Salle de sport Décathlon pour le cours à Pornic',
    1
),(
    2,
    'salle_la_plaine',
    'png',
    'Salle pour le cours à La Plaine sur Mer',
    1
),(
    3,
    'brains_2016',
    'PNG',
    'Exemple de cours se déroulant à Brains',
    1
),(
    4,
    'formation_janvier_2008',
    'JPG',
    'Formation d\'animateurs par le CDIT',
    0
),(
    5,
    'ou_danser',
    'PNG',
    'Photo d\'un bal country',
    2
),(
    6,
    'pot_com',
    'JPG',
    'Photo d\'un bal country',
    4
),(
    7,
    'cecile_et_yann_tours',
    'jpg',
    'Yann Chauveau et Cécile Haillot se tenant côte à côte',
    5
),(
    8,
    'IMG_7478',
    'JPG',
    'Exemple d\'un cours',
    5
),(
    9,
    'st_brevin_noel_17',
    'JPG',
    'Bal de Nöel de 2017',
    5
),(
    10,
    'contact',
    'jpg',
    'Cécille et Laurent Haillot',
    7
),(
    11,
    'brains_2016',
    'PNG',
    'Cécile animant un cours à Brains, 2016',
    3
),(
    12,
    'IMG_1161_DxO',
    'jpg',
    'Photo des bénévoles du festival Country en Retz, 2012',
    3
),(
    13,
    'IMG_1372',
    'JPG',
    'Photo de groupe',
    3
),(
    14,
    'IMG_3394',
    'JPG',
    'Photo d\'un groupe de démonstration',
    3
),(
    15,
    'IMG_7493',
    'JPG',
    'Photo d\'un cours',
    3
),(
    16,
    'IMG_8191',
    'png',
    'Photo de groupe après un bal country',
    3
),(
    17,
    'IMG_8392',
    'JPG',
    'Photo d\'un groupe de danseurs',
    3
),(
    18,
    'Magali',
    'JPG',
    'Photo de Cécile aux côtés de la chorégraphe Magali',
    3
),(
    19,
    'NTA_2011',
    'JPG',
    'Photo de Cécile expliquant des pas',
    3
),(
    20,
    'presse_cécile_initiation',
    'JPG',
    'Photo de Cécile donnant une initiation, photo utilisée dans la presse',
    3
),(
    21,
    'Rachel_McEnaney',
    'JPG',
    'Photo de Cécile aux côtés de la chorégraphe Rachel McEnaney',
    3
),(
    22,
    'Rob_Grower',
    'JPG',
    'Photo de Cécile aux côtés du chorégraphe Rob Grower',
    3
),(
    23,
    'réveillon_st_viaud_2019_01',
    'jpg',
    'Réveillon du nouvel an 2019, Saint Viaud',
    3
),(
    24,
    'réveillon_st_viaud_2019_02',
    'jpg',
    'Réveillon du nouvel an 2019, Saint Viaud',
    3
),(
    25,
    'réveillon_st_viaud_2019_03',
    'jpg',
    'Réveillon du nouvel an 2019, Saint Viaud',
    3
);
 
-- On ajoute le contenu dans la table links
INSERT INTO `links`(`id`, `src`, `id_page`)
VALUES(
    0,
    'https://countrystorytour.jimdofree.com/tous-les-pots-communs-en-france-country-line-dance-2019-2020/',
    4
),(
    1,
    'http://potcommun-country-paysdeloire.e-monsite.com/pages/calendrier-des-bals-pays-de-loire.html',
    2
),(
    2,
    'http://aboutwesternlinedance.fr/',
    2
),(
    3,
    'http://westcheyenneattitude.e-monsite.com/pages/bal-country.html',
    2
),(
    4,
    'http://goulainecountry.fr/news/news-0-14+goulaine-country.php',
    2
);
 
-- On ajoute le contenu dans la table pages
INSERT INTO `pages`(`id`, `name`, `label`)
VALUES(0, 'index', 'Index'),(1, 'classes', 'Cours'),(2, 'events', 'Où danser'),(3, 'souvenirs', 'Souvenirs'),(4, 'pot_commun', 'Pot Commun'),(5, 'faq', 'FAQ'),(
    6,
    'layout',
    'En tête et Pied de page'
),(7, 'contact', 'Contact');
 
-- On ajoute le contenu dans la table texts
INSERT INTO `texts`(`id`, `content`, `id_pages`)
VALUES(
    0,
    'Cécile donne des cours en Loire Atlantique dans le Pays de Retz',
    0
),(
    1,
    'L\'inscription se fait directement en cours, vous pouvez faire un cours d\'essai.... pensez a vos certificats médicaux !',
    0
),(
    2,
    'Cécile est une animatrice diplômée\r\nCertificat de Qualification Professionnelle d\'animation dansé, le seul qui permet a ce jour d\'être rémunéré en tant que prof !\r\n\r\nDiplôme d\'Initiateur Fédéral de la FFD.\r\n\r\nBrevet Fédéral d\'Animation Dansée de la FFD\r\n\r\nCDIT Niveau III,\r\n\r\nNiveau 1 de Country Form,\r\n\r\nDF5 du NTA\r\n\r\nAttention !!!\r\nLe CQP donne un cadre pour le titre de professeur de danse country rémunéré pour cette activité mais n\'interdit pas aux autres de donner des cours sans aucun diplôme !',
    0
),(
    3,
    'Ci-dessous vous pouvez trouver un lien vers la liste des pots communs de France',
    4
),(
    4,
    'Un tout nouveau site a été créé !',
    0
),(
    5,
    'Le calendrier ci-dessous est tenu a jour par Christine de l\'association Jambalaya d\'Oudon',
    2
),(
    6,
    'Voici les liens de quelque sites qui tiennent un calendrier a jour de manière régulière :',
    2
),(
    7,
    'Dans le tableau suivant, quelques dates dans le pays de Retz, avec les clubs ou j\'enseigne...',
    2
);
 
-- On ajoute le contenu dans la table time
INSERT INTO `time`(`id`, `hour`, `level`, `descr`)
VALUES(
    0,
    '18:30:00',
    'débutant',
    'Vous n\'en avez jamais fait auparavant ou vous avez déjà pratiqué la danse country et vous êtes encore débutant.\r\nTout âge (de 9ans à 97 ans... les enfants doivent être accompagnés d\'un adulte qui participe au cours)'
),(
    1,
    '19:45:00',
    'loisirs - tous niveaux confondus',
    'Vous avez déjà les bases de la country, la technique des pas est acquise, on apprend des danses...'
),(
    2,
    '20:45:00',
    'novice et intermédiaire',
    'Vous avez déjà une bonne expérience de la country et vous êtes au clair avec la technique et la nomenclature des pas. On travaille la technique et on apprend des danses plus compliqués'
),(
    3,
    '14:30:00',
    'loisirs - débutant',
    'Vous n\'en avez jamais fait auparavant ou vous avez déjà pratiqué la danse country et vous êtes encore débutant.\r\nTout âge (de 9ans à 97 ans…)'
),(
    4,
    '19:00:00',
    'loisirs - débutant et novice',
    'Vous n\'en avez jamais fait auparavant ou vous avez déjà pratiqué la danse country et vous êtes encore débutant,<br>tout âge (de 9ans à 97 ans... les enfants doivent être accompagnés d\'un adulte qui participe au cours)'
),(
    5,
    '20:00:00',
    'novice et intermédiaire',
    'Vous avez déjà une bonne expérience de la country et vous êtes au clair avec la technique et la nomenclature des pas. On travaille la technique et on apprend des danses plus compliqués'
);

-- On ajoute le contenu dans la table users
INSERT INTO `users`(`id`, `name`, `password`)
VALUES(
    0,
    'test',
    'bcbb117d5f400551c9d197bb6482e759'
);


-- On ajoute le contenu dans la table events
INSERT INTO `events`(
    `id`,
    `date`,
    `type`,
    `place`,
    `who`,
    `reservation`,
    `playlist`
)
VALUES(1,'2020-12-31','Reveillon buffet sur CD','Salle du Lac, rue des sport, Saint Viaud 44','Sud Estuaire Dancin\'Cowboy, animé par Cécile',0,NULL);
