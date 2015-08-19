# nl.sp.generic

Deze extensie bevat de volgende functionaliteiten:

* Tonen van gezinsleden
* API voor koppelen bijdragen aan lidmaatschap op basis van source veld

## API Contribution.LinkToMembership

Deze API functie vindt alle contributies aan de hand van het _source_ veld en koppelt de contributie aan een actief lidmaatschap.

Het source veld wordt daarna geleegd. En de het type lidmaatschap kan opgegeven worden.
Als een contributie al gelinkt is aan een lidmaatschap dan wordt daar niks mee gedaan.

*Parameters*

* _source_: source veld van de contributies die gevonden moeten worden
* _membership_type_ids_: een komma gescheiden lijst van membership type id voor het vinden van actieve lidmaatschappen
* _limit_: optioneel, standaard op 200
