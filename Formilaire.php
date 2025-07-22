<!DOCTYPE HTML>
<HTML LANG="fr">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE>Page de traitement</TITLE>
    </HEAD>
    <BODY>
        <P>Dans le formulaire précédent, vous avez fourni
        information suivante: </P>
        <?php
            echo 'nom:'
    .$_POST["nom"].'<BR>';
            echo 'prenom:'
    .$_POST["prenom"].'<BR>';
            echo 'email:'
    .$_POST["prenom"]. '<BR>';
            echo 'Date de naissance:'
    .$_POST["Date de naissance"].'<BR>';
            echo 'Numéro de téléphone:'
    .$_POST["Numéro de téléphone"].'<BR>';
            echo 'Motivation:'
    .$_POST["Motivation"].'<BR>';
            echo 'pièce identité:'
    .$_POST["pièce identité"]'<BR>';
    ?>

    </BODY>
</HTML>
    
        