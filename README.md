# 4S_Handleidingen

## Situatie

Dit is een 'legacy' project van Team 4S, uit de tijd dat het bedrijf nog 3S heette (simpelweg: Script Serpents Software). De website staat al jaren online, maar trekt nog steeds veel bezoekers. Daarom heeft 4S besloten om de applicatie toch te moderniseren. Ze hebben ook besloten om daarbij een modern framework te gebruiken, en de layout aan te pakken met Bootstrap.

Jij bent een beginnend stagiair bij 4S, en je eerste klus is het oplossen van een aantal tickets in dit project. Omdat de site niet tot de 'core bussiness' van het bedrijf behoort, is dit een heel geschikt project om mee te beginnen. Onder toeziend oog mag jij laten zien wat je kunt. Je krijgt een korte uitleg over hoe dit project in elkaar zit, en vervolgens mag je zelf een aantal opdrachten gaan uitvoeren om dit project af te maken.

Je krijgt toegang tot een GIT repository, waar een Laravel applicatie in klaar staat. De werkgever gaat ervan uit dat je weinig ervaring hebt met Laravel, dus je krijgt een gids (_hulpkaarten_) meegeleverd over hoe je de applicatie draaiend krijgt op jouw systeem, en je kunt altijd vragen stellen aan je stagebegeleider (_je docent_). Daarna is het aan jou om alle tickets aan te pakken en af te ronden.

## Ontwikkelomgeving

Dit project werkt alleen als je Laragon 6 draait met PHP 8.1.x en MySQL 8.x. Gebruik ook de Composer versie die meegeleverd wordt in Laragon 6.

### Repo werkend krijgen

1. Clone de repo naar je lokale pc, zorg dat de repo komt in C:\laragon\www\4s_manuals
2. Run in cmd `composer install`
3. Kopieer .env.example naar .env (niet hernoemen, want de .example moet je voor je teamgenoten blijven bestaan)
4. Run `php artisan key:generate`
6. Run `php artisan migrate`
7. Als het script vraagt of er een database aangemaakt moet worden, kies dan yes.
8. Nu staat de structuur van je database. Je kunt nu de testdata importeren om fatsoenlijk met de app te werken:
    * Ga in phpMyAdmin naar de database _4s_manuals_
    * Ga naar importeren en kies het _4s_manuals.sql_ bestand uit de hoofdmap van je project
    * Importeer de data
9. Open het Laragon venster en klik op stop, en daarna weer op start all. Als er een windows beveiligingsvenster opent, klik dan op ja. 
10. Ga naar 4s_manuals.test



## Uitleg mappen en bestanden

### Files

De pagina’s die aangepast moeten worden, zijn te vinden in `/resources/views`. **ELKE PAGINA** wordt opgebouwd in deze folder via `/components/layouts/default.blade.php`. Hoe dat werkt kun je vinden door het volgende hoofdstukje door te nemen van de documentatie: [https://laravel.com/docs/master/blade#layouts-using-components](https://laravel.com/docs/master/blade#layouts-using-components) Zodra je dat doorgenomen hebt, zou je moeten weten hoe je er achter kan komen waar het stukje HTML staat wat we aangepast willen hebben.

### CSS

We gaan in dit project nog geen gebruik maken van NPM. In plaats daarvan werk je direct in de `/public/css/app.css`.
