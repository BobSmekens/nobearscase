Een minimale webapp die ik alleen lokaal op  een testserver heb gedraait.

Gebruikt een bears en een users table in mySQL via xampp

Voor mensen die niet ingelogd zijn kan de tabel ingezien worden en iedere beer afzonderlijk. Ook kan er gezocht worden naar dichtsbijzijnde beren d.m.v het opgeven van een longitude en een latitude. Als er geen longitude of latitude word opgegeven kan er wel op  afstand worden gesorteerd op basis van een ip uit breda.

Users die zijn ingelogd kunnen zelf een beer aanmaken

Als de user een admin is kan deze een beer updaten of verwijderen

De bears table kan gereset worden naar de originele example_locations.csv die ik van nobears heb gehad

Er zit een globale limiet op requests (alle routes) van 60/minuut.

Uiteindelijk is het een webapp geworden i.p.v de gevraagde api, dit komt voornamelijk omdat ik te enthousiast ben begonnen voordat ik de case echt goed heb doorgelezen, vervolgens al te diep erin zat en ook niet langer wilde wachten om de case in te leveren. Mijn komende tijd ga ik besteden om ditzelfde te herhalen.......maar dan wel voor een echte api.

Ook denk ik dat er siewieso nog een aantal dingen in verwerkt zitten die niet helemaal handig zijn, dit zijn:

Het herschrijven van de tabel op het moment van zoeken/sorteren, dat kan vast minder belastend voor het systeem met een array/nuttigere query in de controller
De authenticatie wordt nu met een session uitgevoerd, maar hier heeft laravel ook modules voor
Het registreren/inloggen en het crud systeem worden allen nog niet goed gevalideerd
...en waarschijnlijk zijn er nog tal van dingen te bedenken

Al met al vond ik het super tof om het programmeren na meer dan 2 jaar weer op te pakke, veel plezier met het doorspitten van de code

admin user = bob@bob.nl pw: bbb
regular user = aron@aron.nl pw: aaa
