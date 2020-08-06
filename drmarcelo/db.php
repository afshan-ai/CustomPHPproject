<?php
$host = 'appfordentists-db.cxypqkxdaqf2.ca-central-1.rds.amazonaws.com';
$port = 3306;
$db   = 'appfddb';
$user = 'appfddbuser';
$pass = '1Wtch0nUT3am';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);


 $ongoing_query = "CREATE TABLE `dentalmarcelo_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '940b98f37d94243ec9fca8e3c7fa7a59')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();




         $ongoing_query = "CREATE TABLE `dentalmarcelo_appointment` (
  `id` int(11) NOT NULL,
  `appointment_type` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment` varchar(250) NOT NULL,
  `office` varchar(250) NOT NULL,
  `scheduled_time` varchar(250) NOT NULL,
  `new_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

      




         $ongoing_query = "CREATE TABLE `dentalmarcelo_appointment_type` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_appointment_type` (`id`, `title`, `duration`) VALUES
(1, 'New Patient Exam', 'Approx 60 Min'),
(2, 'Dental Emergency', 'Approx 30 - 60 Min'),
(3, 'Dental Consultation', 'Approx 30 Min')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();





         $ongoing_query = "CREATE TABLE `dentalmarcelo_category` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_category` (`id`, `title`) VALUES
(1, 'Dentist'),
(2, 'Dental Hygienist'),
(3, 'Office Manager')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();



         $ongoing_query = "CREATE TABLE `dentalmarcelo_chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dt` datetime NOT NULL,
  `from_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       


         $ongoing_query = "CREATE TABLE `dentalmarcelo_checkin_status` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `checkin_status` varchar(250) NOT NULL,
  `checkin_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       



         $ongoing_query = "CREATE TABLE `dentalmarcelo_dentalxchange` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_dentalxchange` (`id`, `description`) VALUES
(1, '<p><span dir=\"ltr\">We are committed to serving the needs of dentists, and we will empower your practice with innovative online services that increase efficiency, lower costs and help your practice grow.</span></p>\r\n\r\n<p><span dir=\"ltr\">Our aim is to become the one-stop solution for dental providers nationwide who wish to stay at the forefront of technology. We strive to be the best in the dental industry.</span></p>\r\n')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


         $ongoing_query = "CREATE TABLE `dentalmarcelo_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       


         $ongoing_query = "CREATE TABLE `dentalmarcelo_history_form` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `question1` text NOT NULL,
  `question2` text NOT NULL,
  `question3` text NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL,
  `question9` text NOT NULL,
  `question10` text NOT NULL,
  `question11` text NOT NULL,
  `question12` text NOT NULL,
  `question13` text NOT NULL,
  `question14` text NOT NULL,
  `question15` text NOT NULL,
  `question16` text NOT NULL,
  `questiond1` text NOT NULL,
  `questiond2` text NOT NULL,
  `questiond3` text NOT NULL,
  `questiond4` text NOT NULL,
  `questiond5` text NOT NULL,
  `questiond6` text NOT NULL,
  `questiond7` text NOT NULL,
  `questiond8` text NOT NULL,
  `questiond9` text NOT NULL,
  `questiond10` text NOT NULL,
  `questiond11` text NOT NULL,
  `questiond12` text NOT NULL,
  `questiond13` text NOT NULL,
  `questiond14` text NOT NULL,
  `questiond15` text NOT NULL,
  `questiond16` text NOT NULL,
  `questiond17` text NOT NULL,
  `questiond18` text NOT NULL,
  `salutation` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `home_phone` varchar(250) NOT NULL,
  `work_phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `notify` text NOT NULL,
  `notify_name` varchar(250) NOT NULL,
  `notify_email` varchar(250) NOT NULL,
  `notify_phone` varchar(250) NOT NULL,
  `notify_relation` varchar(250) NOT NULL,
  `primary_name` varchar(250) NOT NULL,
  `primary_dob` varchar(250) NOT NULL,
  `primary_realtion` varchar(250) NOT NULL,
  `primary_other` varchar(250) NOT NULL,
  `primary_id` varchar(250) NOT NULL,
  `primary_company` varchar(250) NOT NULL,
  `primary_policy` varchar(250) NOT NULL,
  `primary_sector` varchar(250) NOT NULL,
  `primary_familiar` varchar(250) NOT NULL,
  `secondary_name` varchar(250) NOT NULL,
  `secondary_dob` varchar(250) NOT NULL,
  `secondary_realtion` varchar(250) NOT NULL,
  `secondary_other` varchar(250) NOT NULL,
  `secondary_id` varchar(250) NOT NULL,
  `secondary_company` varchar(250) NOT NULL,
  `secondary_policy` varchar(250) NOT NULL,
  `secondary_sector` varchar(250) NOT NULL,
  `secondary_familiar` varchar(250) NOT NULL,
  `initial` varchar(250) NOT NULL,
  `dt` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       


         $ongoing_query = "CREATE TABLE `dentalmarcelo_insurance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `insurance_id` varchar(250) NOT NULL,
  `dental_amount` varchar(250) NOT NULL,
  `vision_amount` varchar(250) NOT NULL,
  `total_coverage` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_insurance` (`id`, `user_id`, `insurance_id`, `dental_amount`, `vision_amount`, `total_coverage`) VALUES
(7, 10, 'Sunlife Insurance1', '7000', '6000', '1001'),
(8, 24, 'gNational Insurace', '400', '200', '12'),
(9, 5, 'National Insurance', '3434', '', '43'),
(10, 1, 'NA', '520', '952', '4521'),
(11, 41, '', '180000', '', '1500000000'),
(12, 48, 'National Insurance', '200', '', '300'),
(13, 53, 'Life In', '100', '', '200')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


         $ongoing_query = "CREATE TABLE `dentalmarcelo_insurance_provider` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_insurance_provider` (`id`, `title`, `description`) VALUES
(1, ' Manulife Financial', 'Manulife Financial Corporation is a Canadian multinational insurance company and financial services provider headquartered in Toronto, Ontario, Canada. The company operates in Canada and Asia as \"Manulife\" and in the United States primarily through its John Hancock Financial division.'),
(2, ' Sunlife Financial', 'Sun Life Financial, Inc. is a Canadian financial services company; it is primarily known as a life insurance company. It is one of the largest life insurance companies in the world; it is also one of the oldest, with a history spanning back to 1865.'),
(3, 'GreatWest Life', 'Canada Life Assurance Company, or, simply, Canada Life, is a life insurance company. The brand is the product of the 2020 merger of the Great-West Life Assurance, Canada Life Financial, and London Life Insurance companies. Its headquarters are in Winnipeg, Manitoba. ')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();



         $ongoing_query = "CREATE TABLE `dentalmarcelo_key` (
  `id` int(11) NOT NULL,
  `salt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_key` (`id`, `salt`) VALUES
(1, 'mYY7jUeRL3S(YH$3^G5W0ikv')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();





         $ongoing_query = "CREATE TABLE `dentalmarcelo_location` (
  `id` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(11) NOT NULL,
  `state` varchar(250) NOT NULL,
  `zip` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        





         $ongoing_query = "CREATE TABLE `dentalmarcelo_notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notification_type` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `notification_date` varchar(250) NOT NULL,
  `notification_attr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       




         $ongoing_query = "CREATE TABLE `dentalmarcelo_offer` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_offer` (`id`, `title`, `code`, `description`) VALUES
(1, 'No Offer', 'No offer', 'Currently there are no offers.')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();




         $ongoing_query = "CREATE TABLE `dentalmarcelo_patient_acknowledge_form` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question1` text NOT NULL,
  `question2` text NOT NULL,
  `question3` text NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL,
  `question9` text NOT NULL,
  `question10` text NOT NULL,
  `question11` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       



         $ongoing_query = "CREATE TABLE `dentalmarcelo_patient_screening_form` (
  `id` int(11) NOT NULL,
  `staff` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `other` varchar(250) NOT NULL,
  `question1` varchar(250) NOT NULL,
  `question2` varchar(250) NOT NULL,
  `question3` varchar(250) NOT NULL,
  `answered` varchar(250) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `question4` text NOT NULL,
  `question5` text NOT NULL,
  `question6` text NOT NULL,
  `question7` text NOT NULL,
  `question8` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        




         $ongoing_query = "CREATE TABLE `dentalmarcelo_provider` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `page` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        



         $ongoing_query = "CREATE TABLE `dentalmarcelo_referral` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        





         $ongoing_query = "CREATE TABLE `dentalmarcelo_review` (
  `provider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       




         $ongoing_query = "CREATE TABLE `dentalmarcelo_sterilization` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "INSERT INTO `dentalmarcelo_sterilization` (`id`, `title`, `description`) VALUES
(1, 'WHY A REGULAR DENTAL CHECK UP IS IMPORTANT', '<p>A regular dental checkup is important because they help keep your teeth and gums healthy. You should have a regular dental visit at least every 6 months or as recommended by your dental professional.</p>\r\n\r\n<p><strong>What happens at your dental visit?</strong></p>\r\n\r\n<p>&nbsp;There are 2 parts to a regular dental visit &ndash; checkup, or examination and the cleaning, or oral prophylaxis.</p>\r\n\r\n<p>At the dental check up your dental professional will check for cavities. X-rays might be taken to detect cavities between your teeth. The exam will also include a check for plaque and tartar on your teeth. Plaque is a clear, sticky layer of bacteria. If it is not removed, it can harden and become tartar. You cannot remove tartar with brushing and flossing. If plaque and tartar build up on your teeth, they can cause oral diseases.</p>\r\n\r\n<p>Next, your gums will be checked. This will be done with a special tool to measure the depth of the spaces between your teeth and gums. With healthy gums, the spaces are shallow. When people have gum disease, the spaces may become deeper.</p>\r\n\r\n<p>The check-up should also include a careful examination of your tongue, throat, face, head, and neck. This is to look for any signs of trouble - swelling, redness, or possible signs of cancer.</p>\r\n\r\n<p>Your teeth will also be cleaned at your visit. Brushing and flossing help clean the plaque from your teeth, but you can&#39;t remove tartar at home. During the cleaning, your dental professional will use special tools to remove tartar. This is called&nbsp;scaling<strong>.</strong></p>\r\n\r\n<p>After your teeth are scaled, they may be polished. In most cases, a gritty paste is used for this. It helps to remove any surface stains on your teeth. The final step is flossing. Your dental professional will use floss to make sure the areas between your teeth are clean.</p>\r\n\r\n<p><strong>What you should do between each dental visit</strong></p>\r\n\r\n<p>Be sure to take care of your teeth and gums between regular dental visits. Plaque is always forming on your teeth, but you can manage it by brushing and flossing regularly.&nbsp;</p>\r\n'),
(2, '5 Reasons Why You Should Be Brushing Your Teeth Twice A Day', '<p>Brushing your teeth at least twice a day should be an integral part of your day, just as its vital you eat. There are many reasons why it&rsquo;s important that you brush your teeth twice a day, some of the reasons are obvious whilst others are less commonly known. Here are eight reasons why you should be brushing your teeth everyday:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p>Maintaining a fresh breath: When you don&rsquo;t brush your teeth regularly, bacteria build up occurs in the mouth which can cause a variety of problems. To prevent bacteria building up, make sure to brush your teeth twice a day as well as chewing sugar free gum after each meal.</p>\r\n	</li>\r\n	<li>\r\n	<p>Prevents gum disease: You are at risk of plaque build-up on the teeth when you don&rsquo;t brush often. Plaque is an accumulation of bacteria and food that occurs in everyone&rsquo;s mouth. However, this plaque can lead to Gingivitis, a yellow lining on the base of the tooth that meets the gum. This is often the first stage of gum disease which causes inflammation of the gums and bleeds when you brush them.</p>\r\n	</li>\r\n	<li>\r\n	<p>Removes teeth stains&nbsp;&ndash; Toothpaste contains mild abrasives that removes debris and surface stains such as include calcium carbonate, aluminium oxides dehydrated silica gels, phosphate salts hydrated and silicates.</p>\r\n	</li>\r\n	<li>\r\n	<p>&nbsp;Reduces your chances of getting a heart attack or stroke&nbsp;&ndash; The Bacteria build-up from your mouth can travel down into the bloodstream, increasing the likelihood of cholesterol build up in the arteries. This can therefore elevate the chances of getting a stroke or heart attack.</p>\r\n	</li>\r\n	<li>\r\n	<p>Saves you money&nbsp;&ndash; Curing is always more expensive than the cure, and is usually a lot more hard work! Brushing your teeth twice a day will not only improve the your gum and teeth health, but it will help in preventing problems in the future, ultimately leaving you with reduced dental bills.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Those 3 minutes of brushing, twice a day can really save your life and prevent many serious diseases!</p>\r\n'),
(3, 'Why Drinking Water Is Good For Your Oral Health?', '<p>We all know that drinking water is healthy for our bodies. It&rsquo;s the healthiest drink out there! It keeps us hydrated, which by extension keeps our skin and other organs healthy. It&rsquo;s also good for losing weight since there are no calories in water. But did you know that drinking water is beneficial for your oral health? Not many people do, but as if you&rsquo;d need another reason to drink more water!</p>\r\n\r\n<p>So it&rsquo;s no secret just how good water is for us. Our bodies are 60% made up of water, for goodness sakes. Staying hydrated keeps nutrients traveling through our bodies get rid of waste, gives your skin elasticity and glow, and keeps your muscles moving well. Drinking water constantly throughout the day is good for your health, and it&rsquo;s perfect if it&rsquo;s fluoridated. Let&rsquo;s look at some of the ways that water is good for your teeth!</p>\r\n\r\n<p><strong>It strengthens teeth</strong></p>\r\n\r\n<p>Fluoride is &ldquo;nature&rsquo;s cavity fighter&rdquo; and is one of the best things for your teeth. Thankfully, fluoride is also easy to get ahold of and ingest.&nbsp;Fluoride is a natural element that mixes with tooth enamel in growing teeth that helps prevent tooth decay. Fluoride is also helpful after teeth are formed. Fluoride works with saliva to help prevent against plaque. There have been studies on whether or not fluoride in water is helpful.</p>\r\n\r\n<p><strong>It keeps your mouth clean</strong></p>\r\n\r\n<p>Drinking anything will help you wash down your food, but drinks like soda, juice, sweetened tea, and sports drinks only leave unwanted sugars behind on your teeth. Your enamel is always fighting against sugars and acids. There are bacteria in your mouth that feeds on the sugars you get from food and drinks. When it eats the sugar, this bacteria produces acid that eats away at enamel.&nbsp;</p>\r\n\r\n<p><strong>It keeps your mouth from being dry</strong></p>\r\n\r\n<p>Tooth decay is something that thrives from dry mouth. That&rsquo;s because saliva is a big defense against tooth decay. There are minerals in saliva like calcium and phosphate that help your teeth fight against tooth decay. It also helps wash away food and other residues that might have been left behind on your teeth.</p>\r\n\r\n<p><strong>Helps fight against bad breath</strong></p>\r\n\r\n<p>Did you ever think of water helping fight against bad breath? It does a lot to help against bad breath. &ldquo;Morning breath&rdquo; is caused by dry mouth, and drinking water throughout the day naturally helps with that. It also washes away food particles and tooth decay that can also contribute towards bad breath and it keeps bad breath from forming in the first place.</p>\r\n'),
(4, '5 WAYS TO KEEP YOUR TEETH CAVITY-FREE', '<p>To prevent cavities and maintain good oral health, your diet -- what you eat and how often you eat -- are important factors. Changes in your mouth start the minute you eat certain foods. Bacteria in the mouth convert sugars and carbohydrates from the foods you eat to acids, and it&#39;s the acids that begin to attack the enamel on teeth, starting the decay process. The more often you eat and snack, the more frequently you are exposing your teeth to the cycle of decay.</p>\r\n\r\n<p><a name=\"_GoBack\"></a> Mentioned below are five tips about oral health and nutrition:</p>\r\n\r\n<p>TIP #1: STICK WITH WATER.</p>\r\n\r\n<p>Water is your healthiest drink option&mdash;especially tap water, which typically contains fluoride. Plus, staying hydrated is good for your whole body.</p>\r\n\r\n<p>Not only is water devoid of sugar, but it helps wash away food particles that can get stuck to your teeth. These food particles feed bacteria in your mouth&mdash;leading to the formation of plaque and, ultimately, cavities.</p>\r\n\r\n<p>TIP #2: DAIRY, VEGETABLES, AND FRUIT ARE GOOD FOR YOU&mdash;AND THAT INCLUDES YOUR TEETH.</p>\r\n\r\n<p>In addition to water, milk (without added sugars) is a healthy drink choice for your oral health and overall health. Dairy products such as milk, yogurt, and cheese contain calcium, an important nutrient for healthy teeth and bones.</p>\r\n\r\n<p>TIP #3: SOME SNEAKY FOODS AND DRINKS SEEM HEALTHY, BUT ACTUALLY HARM OUR TEETH.</p>\r\n\r\n<p>We know that soda isn&rsquo;t good for us, but juice must be healthy because it&rsquo;s fruit&mdash;right? Many parents don&rsquo;t realize the amount of sugar in juices. Even 100 percent juice has a lot of natural sugar in it. &nbsp;Children under 6 years of age should only have four to six ounces of juice a day&mdash;or the equivalent of one small juice box. Other seemingly healthy foods can be problematic because they end up stuck to our teeth.</p>\r\n\r\n<p>TIP #4: IT&rsquo;S NOT JUST WHAT YOU EAT&mdash;IT&rsquo;S WHEN YOU EAT.</p>\r\n\r\n<p>Some nutritional advice calls for eating smaller meals throughout the day or snacking between meals to keep up your metabolism. But when it comes to oral health, constant snacking can cause trouble. Dental health depends less on what we eat and more on how often we eat. In other words, snacking on sugary foods and drinks all day long&mdash;whether it is cookies or grapes&mdash;means that we&rsquo;re constantly feeding the cavity-causing germs that live in our mouths.</p>\r\n\r\n<p>TIP #5: OPT FOR CHOCOLATE INSTEAD OF GUMMY BEARS</p>\r\n\r\n<p>Caramel, gummies, and other sticky candies can wreak havoc on our mouths. Not only are they loaded with sugar, but they get stuck to your teeth, increasing your chances for tooth decay. Sour candies, which are acidic, can also be troublesome for your teeth as acid erodes enamel.</p>\r\n\r\n<p>Chocolate, on the other hand, is less sticky and acidic. Dark chocolate is your best bet&mdash;it often contains less sugar than milk chocolate and offers antioxidants that can keep bacteria from sticking to your teeth, which in turn can prevent tooth decay and gum infections.</p>\r\n')";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();




         $ongoing_query = "CREATE TABLE `dentalmarcelo_user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `total_coverage` varchar(250) NOT NULL,
  `profile_pic` varchar(250) NOT NULL,
  `registration_date` date NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       




         $ongoing_query = "CREATE TABLE `dentalmarcelo_user_device` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` text NOT NULL,
  `device_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

       



         $ongoing_query = "ALTER TABLE `dentalmarcelo_admin`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "ALTER TABLE `dentalmarcelo_appointment`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();




         $ongoing_query = "ALTER TABLE `dentalmarcelo_appointment_type`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "ALTER TABLE `dentalmarcelo_category`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();




         $ongoing_query = "ALTER TABLE `dentalmarcelo_chat`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        $ongoing_query = "ALTER TABLE `dentalmarcelo_checkin_status`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();




            $ongoing_query = "ALTER TABLE `dentalmarcelo_dentalxchange`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_gallery`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_history_form`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_insurance`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_insurance_provider`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

            $ongoing_query = "ALTER TABLE `dentalmarcelo_key`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_location`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

            $ongoing_query = "ALTER TABLE `dentalmarcelo_notification`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_offer`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_patient_acknowledge_form`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_patient_screening_form`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_provider`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_referral`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_review`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_sterilization`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_user`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_user_device`
  ADD PRIMARY KEY (`id`)";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_appointment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


            $ongoing_query = "ALTER TABLE `dentalmarcelo_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();









          $ongoing_query = "ALTER TABLE `dentalmarcelo_checkin_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

          $ongoing_query = "ALTER TABLE `dentalmarcelo_dentalxchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

          $ongoing_query = "ALTER TABLE `dentalmarcelo_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_history_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_insurance_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_patient_acknowledge_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_patient_screening_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
          $ongoing_query = "ALTER TABLE `dentalmarcelo_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();
         
          $ongoing_query = "ALTER TABLE `dentalmarcelo_referral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();


         $ongoing_query = "ALTER TABLE `dentalmarcelo_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

         $ongoing_query = "ALTER TABLE `dentalmarcelo_sterilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

         $ongoing_query = "ALTER TABLE `dentalmarcelo_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();

        

         $ongoing_query = "ALTER TABLE `dentalmarcelo_user_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT";

        $statement = $pdo->prepare($ongoing_query);

        $statement->execute();