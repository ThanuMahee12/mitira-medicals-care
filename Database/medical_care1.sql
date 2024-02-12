-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: medical_care
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `Appointmentcode` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(50) NOT NULL,
  `Chanellingid` int(11) NOT NULL,
  PRIMARY KEY (`Appointmentcode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (2,'2022-09-14T00:04',5);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chenlling`
--

DROP TABLE IF EXISTS `chenlling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chenlling` (
  `Paitenid` int(11) NOT NULL,
  `Doctorid` int(11) NOT NULL,
  `bookingDate` varchar(100) NOT NULL,
  `ForBookDateTime` date NOT NULL,
  `Descrption` varchar(200) NOT NULL,
  `ChenallingId` int(11) NOT NULL AUTO_INCREMENT,
  `Reportno` varchar(30) NOT NULL,
  `Appointment` int(11) NOT NULL DEFAULT 0,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`ChenallingId`),
  KEY `chenlling_ibfk_1` (`Doctorid`),
  KEY `chenlling_ibfk_2` (`Paitenid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chenlling`
--

LOCK TABLES `chenlling` WRITE;
/*!40000 ALTER TABLE `chenlling` DISABLE KEYS */;
INSERT INTO `chenlling` VALUES (2,2,'13-09-22 06:58','0000-00-00','sik',8,'',0,'');
/*!40000 ALTER TABLE `chenlling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diseses`
--

DROP TABLE IF EXISTS `diseses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diseses` (
  `Disescode` varchar(30) NOT NULL,
  `DisesName` varchar(100) NOT NULL,
  `Symbtoms` varchar(1000) NOT NULL,
  `SeriosSymbtoms` varchar(500) NOT NULL,
  `Treatments` varchar(300) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Image` varchar(1000) NOT NULL,
  `Medicine` varchar(100) NOT NULL,
  PRIMARY KEY (`Disescode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diseses`
--

LOCK TABLES `diseses` WRITE;
/*!40000 ALTER TABLE `diseses` DISABLE KEYS */;
INSERT INTO `diseses` VALUES ('ALPS','Autoimmune Lymphoproliferative Syndrome','The major clinical symptoms of ALPS, including fatigue, nosebleeds, and infections, result from a proliferation of lymphocytes and autoimmune destruction of other blood cells. The diagnosis of ALPS is based on clinical findings, laboratory findings, and identification of genetic mutations.','Most cases of ALPS are caused by mutations in the FAS gene. FAS produces a receptor that, when activated, leads to programmed cell death, or apoptosis. This programmed death is an important part of the normal cell lifecycle. When cells do not receive the message that it is time for them to die, an abnormal buildup of cells can result. In the case of ALPS, mutations in FAS cause an abnormal buildup of white blood cells.','There currently is no standard cure for ALPS,, The disorder can be managed by treating low blood-cell counts and autoimmune,, diseases that occur in people with ALPS, as well as by monitoring for and treating the proliferation of immune cells, enlarged spleen, and lymphoma.','','https://www.niaid.nih.gov/sites/default/files/styles/image_style_landscape_md/public/FasMediatedAptosis.jpg?itok=uASlDN-5____https://onlinelibrary.wiley.com/cms/asset/b2cd7d24-703f-4399-938b-d32d7ed65fe7/bjh_7991_f1.gif____https://els-jbs-prod-cdn.jbs.elsevierhealth.com/cms/attachment/42fb3b35-4527-4b59-92ef-e9c37d41baf3/fx1.jpg',''),('Autoimmune','Autoimmune Diseases','Fatigue,Joint pain and swelling,Skin problems,Abdominal pain or digestive issues,Recurring fever,Swollen glands','Psoriatic arthritis,Rheumatoid arthritis (RA),Sjögren’s syndrome,Systemic lupus erythematosus (Lupus, SLE).','anti-inflammatory drugs,,corticosteroids,,pain-killing medication,,immunosuppressant drugs,,physical therapy,,treatment for the deficiency,,surgery','','https://www.niehs.nih.gov/health/assets/images/autoimmune_disease.jpg____https://static.wixstatic.com/media/2c70ec_a5de71f932374e318c8c3aa060648171.png/v1/fill/w_276,h_276,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/2c70ec_a5de71f932374e318c8c3aa060648171.png____https://assets.technologynetworks.com/production/dynamic/images/content/358840/immune-cell-signaling-discovery-could-help-autoimmune-disease-treatment-358840-1280x720.jpg?cb=11648714____https://ars.els-cdn.com/content/image/3-s2.0-B9780128171936000121-f12-01-9780128171936.jpg',''),('C19','Covid19','fever,cough,tiredness,loss of taste or smell,sore throat,headacheaches and pains,diarrhoea,a rash on skin, or discolouration of fingers or toe,red or irritated eyes','difficulty breathing or shortness of breath,loss of speech or mobility, or confusion\r\nchest pain','Call your health care provider or COVID-19 hotline to find out where and when to get a test.,,Cooperate with contact-tracing procedures to stop the spread of the virus.,,If testing is not available, stay home and away from others for 14 days.\nWhile you are in quarantine, do not go to work, to schoo','','https://www.woah.org/app/uploads/cache/2022/05/adobestock-333039083-e1653147797451/554272007.jpeg____https://news.sanfordhealth.org/wp-content/uploads/2020/09/019037-00504-FACEBOOK-COVID-19-SHN-Symptoms-UPDATED-VERSION-1080x1080-1.jpg____https://api.time.com/wp-content/uploads/2020/04/FAQs_SymptomsR1_noText.jpg?quality=85&w=2000____https://www.artisanalgold.org/wordpress/wp-content/uploads/2020/07/COVID-poster-1Eng.png____https://www.allinoneposters.com/SC%20Item%20Images/Coronavirus%20Safety%20Awareness%20Poster.English.01.jpg?resizeid=3&resizeh=600&resizew=600',''),('Cholera','Cholera','profuse watery diarrhea, sometimes described as “rice-water stools”,vomiting,thirst,leg cramps,restlessness or irritability','Municipal water supplies,Ice made from municipal water,Foods and drinks sold by street vendors,Vegetables grown with water containing human wastes,Raw or undercooked fish and seafood caught in waters polluted with sewage','Drinking,,Preparing food or drinks,,Making ice,,Brushing your teeth,,Washing your face and hands,,Washing dishes and utensils that you use to eat or prepare food,,Washing fruits and vegetables','','https://image.shutterstock.com/z/stock-vector-cholera-vector-illustration-labeled-infection-structure-and-symptoms-scheme-educational-1385287967.jpg____https://www.researchgate.net/profile/Muhammad-Zeeshan-Zafar/publication/310603313/figure/fig1/AS:456545730338816@1485860392292/In-this-you-see-that-how-cholera-effect-and-treated.png____http://www.histopathology-india.net/cholera10.png',''),('Dengue','Dengue Fever','Nausea, vomiting,Rash,Aches and pains ','Belly pain, tenderness,Vomiting (at least 3 times in 24 hours),Bleeding from the nose or gums,Vomiting blood, or blood in the stool,Feeling tired, restless, or irritable','Decreased urination,,Few or no tears,,Dry mouth or lips,,Lethargy or confusion,,Cold or clammy extremities','','https://www.niaid.nih.gov/sites/default/files/styles/image_style_landscape_md/public/FemaleAAegyptiMosquito_0.jpg?itok=ejsHcfmR____https://www.cdc.gov/dengue/images/symptoms/DengueSymptomsUpdated.jpg?_=45121____https://ars.els-cdn.com/content/image/1-s2.0-S1319562X21003910-gr1.jpg____https://thumbs.dreamstime.com/b/simple-flat-style-infographics-components-health-education-poster-dengue-fever-infectious-disease-caused-denv-109104454.jpg',''),('HIV','Aids','Fever,Fatigue,Swollen lymph nodes — often one of the first signs of HIV infection,Diarrhea,Weight loss,Oral yeast infection (thrush),Shingles (herpes zoster),Pneumonia','SweatsChills,Recurring fever,Chronic diarrhea Swollen lymph glands,Persistent white spots or unusual lesions on your tongue or in your mouth,Persistent, unexplained fatigue,Weakness,Weight loss,Skin rashes or bumps','sexual health clinics or genitourinary medicine (GUM) clinics\r\nhospitals – usually accident and emergency (A&E) departments','','https://www.cdc.gov/dengue/images/symptoms/DengueSymptomsUpdated.jpg?_=45121____https://img.freepik.com/premium-vector/common-symptoms-covid19_317810-3438.jpg?w=2000',''),('ICD-CM','Asthma','Shortness of breath,Chest tightness or pain,Wheezing when exhaling, which is a common sign of asthma in children,Trouble sleeping caused by shortness of breath, coughing or wheezing\nCoughing or wheezing attacks,that are worsened by a respiratory virus','wheezing, coughing and chest tightness,becoming severe and constant being too breathless to eat, speak or sleep breathing faster a fast heartbeat','Exercise-induced asthma,,Occupational asthma,, triggered by workplace','','https://images.medindia.net/amp-images/patientinfo/asthma.jpg____https://community.aafa.org/fileSendAction/fcType/0/fcOid/519936855234844073/filePointer/519936855234844108/fodoid/519936855234844103/imageType/LARGE/inlineImage/true/normal-vs-asthma-lung.png____https://www.urmc.rochester.edu/MediaLibraries/URMCMedia/pulmonary/images/asthma-causes463.jpg____https://img.freepik.com/free-vector/comparison-healthy-lung-asthmatic-lung_1308-50600.jpg?w=2000','');
/*!40000 ALTER TABLE `diseses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `Doctorid` int(11) NOT NULL,
  `classification` enum('OPT','Nero','Sergen','Bouns','Skin','Sycology','Brain') NOT NULL,
  `Image` varchar(500) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qulification` varchar(100) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Doctorid` (`Doctorid`),
  CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Doctorid`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (2,'OPT','https://i0.wp.com/smsforwishes.com/wp-content/uploads/2022/03/beautiful-girls.jpeg?resize=700%2C834&ssl=1',1,'MBBS',100000.00),(20,'Sergen','https://pbs.twimg.com/media/FWe1POLUAAArbdj?format=jpg&name=large',4,'MBBS Nero',999999.99),(22,'Nero','https://www.behindwoods.com/tamil-actress/nithya-menon/nithya-menon-stills-photos-pictures-354.jpg',5,' MD (2-3 years) or a PhD (3-4 years),',500000.00),(23,'Sergen','https://www.filmibeat.com/img/popcorn/profile_photos/powerstar-srinivasan-20190116101324-20319.jpg',6,'MBBS ',600000.00);
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicine` (
  `Medicinecode` varchar(50) NOT NULL,
  `MedicineName` varchar(200) NOT NULL,
  `Include` varchar(800) NOT NULL,
  `ManuFactureDate` date NOT NULL,
  `ExprieidDate` date NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Category` enum('Common','Nerogitic','Digistc','Painkiller','AntiBoitic','Perdiotic','Emergency','FirstAid','babySurup','Surup','Vaxout','Creams') NOT NULL,
  `image` varchar(500) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `uses` varchar(500) NOT NULL,
  PRIMARY KEY (`Medicinecode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` VALUES ('Anti001','amoxicillin*',' Amoxicillin 250mg and 500mg capsule shells contain Gelatin, Carmoisine (E122), Quinoline Yellow (E104), Titanium Dioxide (E171), and Iron Oxide Yellow (E172).','2022-08-16','2023-08-16',400.00,'AntiBoitic','https://post.healthline.com/wp-content/uploads/2020/08/pills_hands-1200x628-facebook-800x628.jpg','200mg','Amoxicillin also is sometimes used to treat Lyme disease, to prevent anthrax infection after exposure, and to treat anthrax infection of the skin . Talk with your doctor about the possible risks of using this medication for your condition.\r\n\r\nThis medication may be prescribed for other uses; ask your doctor or pharmacist for more information'),('bab120','.newlife.*','.Acid Phos 6: It helps to reduce the weakness, tiredness associated with all the complaints. Calc Phos 6x: For Delayed & Dentition walking, Heals fracture, Joint pains, Weakness it helps. Ferrum Phos 6x.','0000-00-00','2025-06-18',0.00,'babySurup','img/uploads/medicine/12859-new-life-baby-syrup-450ml-tonic-for-children-helps-maintain-402-1000x1000.jpg','120ml',''),('bb123','.BabyBilss.*','.Podophyllum Pel. Q Chamomilla Q Ocimum Sanc. Q Mentha Pip. 3x Calc. Phos. 3x Calc. Fluor. 3x Lecithin 3x Pepsin 3x.','2022-09-06','2024-09-06',650.00,'babySurup','img/uploads/medicine/3410-dfffjvh3tuvhugxz2l02.webp','150ml',''),('bfit120','Babyfit','Calcarea Phosphorica 1X, Chamomilla 3X Kali Muriaticum 1X, Magnesium Phosphoricum 1X, Natrum Carbonicum 1X, Natrum Podophyllum 3X, Podophyllum 3X..','2021-01-03','2024-10-29',550.00,'babySurup','img/uploads/medicine/12510-120ml-baby-fit-syrup-500x500.jpg','120ml',''),('Cep100','Cephalexin*',' magnesium stearate, microcrystalline cellulose, polyethylene glycol, polysorbate 80, sodium starch glycolate, and titanium dioxide','2022-09-23','2024-05-13',400.00,'AntiBoitic','img/uploads/medicine/6480-i-m-2282-cephadex-capsules-500mg.jpeg','250mg',''),('Cev150','Cenvitan',' CENVITAN (MULTIVITAMIN SYRUP) Vitamin A (as a Acetate 20000 I.U)) 40 mg. Vitamin D (as D3 2000 I.U) 50 mcg. Vitamin B1 (Thiamin) 25 mg','2020-01-13','2025-07-16',550.00,'babySurup','img/uploads/medicine/8085-CENVITAN-BABY-SYRUP.jpg','150ml',''),('Cip565','Ciprofloxacin ','microcrystalline cellulose, silicon dioxide, crospovidone, magnesium stearate, hypromellose, titanium dioxide, and polyethylene glycol.','2022-09-30','2024-06-26',300.00,'AntiBoitic','img/uploads/medicine/14242-floxip-500mg-ciprofloxacin-tablets-ip-1.jpg','500mg',''),('Cli34',' Clindamycin ','','2022-09-02','2024-12-27',300.00,'AntiBoitic','img/uploads/medicine/11806-Clindamycin.jpg','125mg',''),('Com001','Panadol500','starch,pregelatinised, povidone, maize starch, potassium sorbate, talc, stearic acid, hypromellose, triacetin, and carnauba wax','2022-08-01','2025-08-01',100.00,'Common','https://www.kapruka.com/cdn-cgi/image/width=700,quality=93,f=auto/shops/specialGifts/additionalImages/large/1600689411153_panadol_M.jpg','500mg','Headaches, including migraine,Body aches,Muscular aches & pains,Cold & flu symptoms,Joint pain/osteoarthritis,Period pain,Toothaches,Sore throats'),('CSy001','Infant’s Cough Syrup','Tolu 0.04 ml, Acetic acid diluted 0.33 ml, ammonium chloride 80 mg, sodium citrate 40 mg, glycerine 0.20 ml, syrup q.s. to 4 ml.','2024-08-10','2024-06-20',1300.00,'babySurup','https://www.chemist.net/media/catalog/product/cache/d090c8c05307b73fc9ae6f19f6d32c2f/b/e/benylin-infants-cough-syrup_sp15253.jpg','125ml','Benylin Infant\'s Cough Syrup is a soothing syrup which relieves the symptoms of dry, tickly coughs in children aged 3 months to 5 years'),('Do23','Doxycycline','are gelatin, magnesium stearate, shellac glaze, sodium lauryl sulfate, starch, quinoline yellow (E104), erythrosine (E127), patent blue V (E131), titanium dioxide (E171), iron oxide black (E172), and propylene glycol.','2022-09-01','2024-10-22',500.00,'AntiBoitic','img/uploads/medicine/17290-Doxycycline_for_STIs.jpg','100mg',''),('Mlt123','Multivitamin','Grape seed Extract, Ginseng Extract, Green Tea Extract, Ginkgo Biloba Extract, Garlic, Antioxidant, Vitamins, Minerals & Trace Elements Softgel Capsules','2022-09-08','2024-06-29',660.00,'Common','img/uploads/medicine/18048-5g-multivitamin-capsules-250x250.webp','300ml',''),('Parace120mg/5ml','Paracetamol 120mg/5ml Oral Suspension','Methyl hydroxybenzoate (E218),Propyl hydroxybenzoate (E216),Sucrose 3g/5ml,Sorbitol (E420),Propylene Glycol (E1520)','2022-08-01','2023-08-23',500.00,'babySurup','https://5.imimg.com/data5/SELLER/Default/2022/6/TV/VJ/UC/21276273/paracetamol-syrup-500x500.jpg','30mg','Fever,Mild to moderate pain, Post Vaccination Fever'),('VitC500','VitaminC500mg',' gluten, wheat, milk derivatives, preservatives, artificial flavours or artificial sweeteners.','2022-09-06','2022-09-08',750.00,'Common','img/uploads/medicine/15694-28451864a1310fa0e03bac1dcdd33273.png','500mg',''),('wel100','Wellbaby','With vitamins A, C and D. Vitamin D contributes to','2021-07-13','2024-11-20',450.00,'babySurup','img/uploads/medicine/11470-wellbaby_multivitamin_liquid_front_CTWBY150L13WL4E_9de013e8-4ad6-4764-a82c-5f7abfbe2ec7_1024x1024.webp','100ml','');
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paient`
--

DROP TABLE IF EXISTS `paient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paient` (
  `PaientId` int(11) NOT NULL,
  `BloodGroup` enum('A+','A-',' B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `Height` decimal(10,2) NOT NULL,
  `Wight` decimal(10,2) NOT NULL,
  `Alergy` varchar(100) NOT NULL,
  `PaidSatus` enum('Paid','UnPaid','Expried') NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `PaientId` (`PaientId`),
  CONSTRAINT `paient_ibfk_1` FOREIGN KEY (`PaientId`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paient`
--

LOCK TABLES `paient` WRITE;
/*!40000 ALTER TABLE `paient` DISABLE KEYS */;
INSERT INTO `paient` VALUES (11,'AB+',167.89,78.90,'1','UnPaid',1),(24,' B+',155.22,80.00,'no','Paid',6),(25,'A+',188.25,78.90,'skinalery','Paid',7),(27,'O+',185.24,45.00,'null','UnPaid',9),(30,' B+',145.25,65.00,'yes','UnPaid',10);
/*!40000 ALTER TABLE `paient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report` (
  `Reportno` int(11) NOT NULL AUTO_INCREMENT,
  `patientno` int(11) NOT NULL,
  `Doctorno` int(11) NOT NULL,
  `Descrption` varchar(500) NOT NULL,
  `Medicine` varchar(200) NOT NULL,
  PRIMARY KEY (`Reportno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabletesbuy`
--

DROP TABLE IF EXISTS `tabletesbuy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabletesbuy` (
  `Billno` int(11) NOT NULL AUTO_INCREMENT,
  `Medicinecode` varchar(50) NOT NULL,
  `numberofitem` int(11) NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`Billno`),
  KEY `Medicinecode` (`Medicinecode`),
  CONSTRAINT `tabletesbuy_ibfk_1` FOREIGN KEY (`Medicinecode`) REFERENCES `medicine` (`Medicinecode`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabletesbuy`
--

LOCK TABLES `tabletesbuy` WRITE;
/*!40000 ALTER TABLE `tabletesbuy` DISABLE KEYS */;
INSERT INTO `tabletesbuy` VALUES (1001,'Anti001',2,1000);
/*!40000 ALTER TABLE `tabletesbuy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Category` enum('Customer','Doctor','Admin','Pharmacist') NOT NULL DEFAULT 'Customer',
  `Gender` varchar(20) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Mobileno` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `Address` varchar(300) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ThanuMahee','Thanush126','Mahendran Thanujan','Admin','Male','1998-06-12','0766859048','thanujan126@gmail.com','981643348V','No.02,RajaVeethy, nallur, Jaffna'),(2,'Yuka','123456','Yukatharsa Jeevantharasa','Doctor','Female','1999-05-31','0750150628','jeeyukatharsa@gmail.com','996520048V','Batticcallo'),(11,'kaji','Kaj2009','Kajaane Mahendran','Customer','Female','2001-09-27','075646789','kajee9@gmail.com','525464564456V','No.02,RajaVeethy,\r\nnallur,\r\nJaffna'),(20,'Siva','virsika','Tanenthiran Sivaparan','Doctor','Male','2022-09-22','04578962','siava@gmail.com','9816435648V','Kokuvil'),(21,'Sarankan1234','Sara1234','KuThasan Sharankan','Customer','Male','2022-09-14','0987656556','sara@gmail.com','1213242345534V','Pannkam'),(22,'Sureka','Sunthar','Sureka Sunthararasa','Doctor','Female','2022-09-20','077785456','sutharasureka@gmail.com','651454587562V','Mullithivu'),(23,'MithoNK','Kalantham','Kalanatharasan Mithursan','Doctor','Male','2022-04-12','01744745705','mithu@gmail.com','12314564785456V','Mallkam'),(24,'Laksu','123456','Laksana Sivakumaran','Customer','','2012-09-03','253465646','laddu@gmail.com','hbfghfgh','Thellipalai'),(25,'Atash','Password','Asstains Athash','Customer','Male','2022-09-21','0112524152','asstain@gmil.com','6352564165125V','Asstains@gmail.com'),(26,'Arigajan','naksu','Viyachathiran Thanujan','Customer','Male','2015-09-16','05454546521','Thanusha@gmail.com','5445451521212212V','Kopay'),(27,'Chooty','Password','Balachandran Thinusan','Customer','Male','2022-09-15','05554548','thinu@gmail.com','445455458V','Chavakacheri'),(28,'Miyakutty','Thusa','Tharmiya Balaraya','Customer','Female','2022-09-29','05454546521','thar','6845646465154V','Thirunalvelli'),(29,'Mathusan','Password','Mathusan mathus','Customer','Male','2022-09-29','05554548','mathu@gmail.com','23135126415645V','Jaffna'),(30,'kayal','123456','Kayalvili chandrakumar','Customer','','2022-09-30','','kayal@gmail.com','254545564','PointpetroRoad');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-15 20:47:59
