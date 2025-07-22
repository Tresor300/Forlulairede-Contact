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
            $nom = $_POST["nom"];
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
            echo 'Pièce identité:' .$_POST["doc"].'<BR>';
        ?>          
    </BODY>
</HTML>

        