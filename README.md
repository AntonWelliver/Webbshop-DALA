## Webbshop-DALA

__Gruppnamn__: DALA

__Gruppmedlemmar__: David, Anton, Lars & Alexander

__Projektledare__: Anton

__Live__: [webbutvecklinggöteborg.se](webbutvecklinggöteborg.se)

__Idén för webbshoppen__: En webbshop för matleverans till dörren. Maten kan delas upp i olika kategorier som "Frukt", "Drycker", "Grönsaker". Administratören kan logga in, ändra pris, lägga till och ta bort rätter. Kunderna ska kunna bläddra och handla mat i webshopen utan att vara inloggad, men också kunna skapa ett konto och spåra sina inköp och se sin egen köphistorik. Du ska kunna få rekommendationer enligt vad du köpt tidigare. Det ska också vara möjligt att få rabatter om du registrerar dig för nyhetsbrev.

## Kravspecifikation:
- [x] Alla sidor skall vara responsiva. (G)
      *Vi använder Semantic för responsivitet*
- [x] Arbetet ska implementeras med objektorienterade principer. (G) <br>
      *Vi har kodat utifrån klasser som ligger i mappen Includes.*
- [x] Skapa ett konceptuellt ER diagram, detta ska lämnas in vid idégodkännandet G)
      *Se foldern diagram*
- [x] Beskriv er företagsidé i en kort textuell presentation, detta ska lämnas in vid idégodkännandet (G)
      *Se Idén för webbshoppen ovan* 
- [x] All data som programmet utnyttjar ska vara sparat i en MYSQL databas (produkter, beställningar, konton mm) (G)
      *Vi använder PDO för att kommunicera med MYSQL-databasen i includes/database.php*
- [x] Det ska ﬁnnas ett normaliserat diagram över databasen i gitrepot G)
      *Se foldern diagram*
- [x] Man ska kunna logga in som administratör i systemet (G) <br>
      *Administratören sätts på dataplatsen med true/false och för att komma in i admin sidan så klickar man på admin icon*
- [x] Inga Lösenord får sparas i klartext i databasen (G) <<br>
      *Vi har lagrat lösenord med password_hash och hämtat ut det med password_verify*
- [x] En besökare ska kunna beställa produkter från sidan, detta ska uppdatera lagersaldot i databasen (G) <br>
      *Vi lagrar beställningar i en ordertabell i databasen, produkter har ett attribut unitsInStock som uppdateras när man gör en order*
- [x] Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G) <br>
      *I admin.php där finns det fält för att uppdatera produkter i lager.*
- [x] Administratörer ska kunna se en lista på alla gjorda beställningar (G)
      *Man kan klicka oå se gjorda beställningar i admin.php*
- [x] Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra ﬂera (G)
      *Alla produkter har en kategori som spartas i databasen*
- [x] Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en kategori (G) <br>
      *Vi har en all products där man kan se alla våra produkter, samt de olika kategorierna i vår sidebar på index.php*
- [x] Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G)
      *Vi sparar kundvagnen som en array i $__SESSION*
- [x] Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G) <br>
      *Du måste vara inloggad för att få nyhetsbrev, nyhetsbrevs signup finns på index.php under produkterna*
- [x] Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G)
      *Admin kan se detta under admin.php*
- [x] Besökare ska kunna välja ett av ﬂera fraktalternativ (G)
      *Detta görs i cart.php*
- [x] Tillgängliga fraktalternativ ska vara hämtade från databasen (G)
      *Vi hämtar dem från databasen med hjälp av ajax*
- [ ] Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG)
- [ ] En administratör behöver godkännas av en tidigare administratör innan man kan logga in fösta gången (VG)
- [x] Administratörer ska kunna markera beställningar som skickade (VG)
      *Admin kan markera ordrar som skickade i admin.php*
- [] När man gör en beställning ska man också få chansen att skriva upp sig för nyhetsbrevet (VG)
      *Delvist löst, man kan få chancen att skriva upp sig för nyhetsbrevet när man registrerar sig*
- [ ] När besökare gör en beställning ska hen få ett lösenord till sidan där man kan logga in som kund (VG)
- [ ] När man är inloggad som kund ska man kunna se sina gjorda beställning och om det är skickade eller inte (VG)
      *Påbörjat men tidbegränsningar och hur vi struktureat datababaser gjorde det var för svårt för att hinna med*
- [ ] Som inloggad kund ska man kunna markera sin beställning som mottagen (VG)
- [x] Administratörer ska kunna redigera vilka kategorier en produkt tillhör (VG)
      *Admin kan göra detta i admin.php*
- [ ] Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en titel och en brödtext (VG)
- [x] Administratörer ska kunna lägga till och ta bort produkter (VG)
      *Admin kan göra detta i admin.php*
