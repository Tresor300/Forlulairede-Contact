<!DOCTYPE HTML>
<HTML LANG="fr">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE>Page de traitement</TITLE>
    </HEAD>
    <BODY>
        <P>Dans le formulaire précédent, vous avez fourni
        information suivants: </P>
        <?php  
                echo 'Nom:'. $_POST["nom"].'<BR>';
                echo 'Prenom:'. $_POST["prenom"].'<BR>';
                echo 'email:' . $_POST["email"]. '<BR>';
                echo 'Date de naissance:'. $_POST["date"].'<BR>';
            if(isset ($_POST['sex']))
            {
                 echo 'Genre:' .$_POST['sex'] .'<BR>';
            }
            else
            {
                 echo 'genre non selectionné. <BR>';
            }

            echo 'Numéro de téléphone:'. $_POST["numero"].'<BR>';
            echo 'Motivation:' .$_POST["motivation"].'<BR>';
            echo 'Pièce identité:' .$_POST["filename"].'<BR>';
           /* var_dump($_FILES);
            var_dump($_POST);*/


            $nomOrigine = $_FILES["doc"]["name"];
            $elementChemin = pathinfo($nomOrigine);
            $extensionFichier = $elementChemin["extension"];
            $extensionsAutorisees = array("pdf");
            if(!(in_array($extensionFichier, $extensionsAutorisees)))
            {
                echo "Le fichier n'a pas l'extension attendue";
            }
            else
            {
                //copie dans le repertoire du script avec un nom
                //incluant l'heure a la seconde pres
                $nomUtilisateur = $_POST["filename"];
                $repertoireDestination = dirname(__FILE__)."/upload/";
                $nomDestination = $nomUtilisateur."fichier_du_".date("YmdHis").".".$extensionFichier;

                if(move_uploaded_file($_FILES["doc"]["tmp_name"], $repertoireDestination.$nomDestination))
                {
                    echo "Le fichier temporaire".$_FILES["doc"]["tmp_name"]." a été déplacé vers ".$repertoireDestination.$nomDestination;
                }
                else
                {
                    echo "Le fichier n'apas été uploadé (trop gros ?) ou"."Le déplacement du fichier temporaire a échoué"." vérifiez l'existence du repertoire ".$repertoireDestination;
                }
            }
            
           
                //Sécurisation basique
                function clean($val)
                {
                    return htmlspecialchars(trim($val));
                }

                //Récupération des données
                $nom = clean($_POST["nom"]);
                $prenom = clean($_POST["prenom"]);
                $email = clean($_POST["email"]);
                $date_naissance = clean($_POST["date"]);
                $Genre = clean($_POST["sex"]);
                $telephone = clean($_POST["numero"]);
                $motivation = clean($_POST["motivation"]);

                $fichier_nom = $_FILES["doc"]["name"];
                $fichier_type = $_FILES["doc"]["type"];
                $fichier_taille = $_FILES["doc"]["size"] / 1024;

                echo "<H2>Données du formulaire</H2>";
                echo "<TABLE BORDER='1' CELLPADDING='8'>";
                echo "<TR>
                            <TH>NOM</TH>
                            <TH>Prénom</TH>
                            <TH>Email</TH>
                            <TH>Date de naissance</TH>
                            <TH>Genre</TH>
                            <TH>Numero de téléphone</TH>
                            <TH>Motivation</TH>
                            <TH>Fichier</TH>
                    </TR>";
                echo "<TR>
                        <TD>$nom</TD>
                        <TD>$prenom</TD>
                        <TD>$email</TD>
                        <TD>$date_naissance</TD>
                        <TD>$Genre</TD>
                        <TD>$telephone</TD>
                        <TD>$motivation</TD>
                        <TD>$fichier_nom</TD>
                    </TR>";
                
                echo "</TABLE>";

                //1. NOM du fichier ou enregitrer ( dans le dossier que to  script)
                $fichierExport = "formulaire.csv";
                $ajouterBOM = !file_exists($fichierExport);

                //Ouvre le fichier en mode binaire
                $handle = fopen($fichierExport, "a+b");

                //si le fichier est vide ou n'existe pas ajoute l'entête BOM
                if($ajouterBOM)
                {
                    fwrite($handle, "\xEF\xBB\xBF"); //BOM UTF-8pour excel  
                    fputcsv($handle, array("Nom", "Prenom", "Email", "Date de naissance", "Genre", "Téléphone", "Motivation", "Fichier"), ";");
                }

                fputcsv($handle, array($nom, $prenom, $email, $date_naissance, $Genre, $telephone, $motivation, $fichier_nom), ";");
                fclose($handle);
               echo "<P><STRONG>Données enregistrées dans '$fichierExport'.</STRONG></P>";
        
        ?>   


    </BODY>
</HTML>
        