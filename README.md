## Webbshop-DALA

__Gruppnamn__: DALA

__Gruppmedlemmar__: David, Anton, Lars & Alexander

__Projektledare__: Anton

__Idén för webbshoppen__: En webbshop för matleverans till dörren. Maten kan delas upp i olika kategorier som "Frukt", "Drycker", "Grönsaker". Administratören kan logga in, ändra pris, lägga till och ta bort rätter. Kunderna ska kunna bläddra och handla mat i webshopen utan att vara inloggad, men också kunna skapa ett konto och spåra sina inköp och se sin egen köphistorik. Du ska kunna få rekommendationer enligt vad du köpt tidigare. Det ska också vara möjligt att få rabatter om du registrerar dig för nyhetsbrev.

## Kravspecifikation:
- [x] Alla sidor skall vara responsiva. (G)
- [x] Arbetet ska implementeras med objektorienterade principer. (G) <br>
      Vi har kodat utifrån klasser som ligger i mappen Includes.
- [x] Skapa ett konceptuellt ER diagram, detta ska lämnas in vid idégodkännandet G)
- [x] Beskriv er företagsidé i en kort textuell presentation, detta ska lämnas in vid idégodkännandet (G)
- [x] All data som programmet utnyttjar ska vara sparat i en MYSQL databas (produkter, beställningar, konton mm) (G)
- [x] Det ska ﬁnnas ett normaliserat diagram över databasen i gitrepot G)
- [x] Man ska kunna logga in som administratör i systemet (G) <br>
      Administratören sätts på dataplatsen och för att komma in i admin sidan så måste man lägga till admin.php (för säkerhets skull)
- [x] Inga Lösenord får sparas i klartext i databasen (G)
- [x] En besökare ska kunna beställa produkter från sidan, detta ska uppdatera lagersaldot i databasen (G)
- [x] Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G)
- [x] Administratörer ska kunna se en lista på alla gjorda beställningar (G)
- [x] Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra ﬂera (G)
- [x] Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en kategori (G)
- [x] Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G)
- [x] Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G)
- [x] Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G)
- [x] Besökare ska kunna välja ett av ﬂera fraktalternativ (G)
- [x] Tillgängliga fraktalternativ ska vara hämtade från databasen (G)

- [ ] Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG)
- [ ] En administratör behöver godkännas av en tidigare administratör innan man kan logga in fösta gången (VG)
- [ ] Administratörer ska kunna markera beställningar som skickade (VG)
- [ ] När man gör en beställning ska man också få chansen att skriva upp sig för nyhetsbrevet (VG)
- [ ] När besökare gör en beställning ska hen få ett lösenord till sidan där man kan logga in som kund (VG)
- [ ] När man är inloggad som kund ska man kunna se sina gjorda beställning och om det är skickade eller inte (VG)
- [ ] Som inloggad kund ska man kunna markera sin beställning som mottagen (VG)
- [ ] Administratörer ska kunna redigera vilka kategorier en produkt tillhör (VG)
- [ ] Administratörer ska kunna skicka nyhetsbrev från sitt gränssnitt, nyhetsbrevet ska sparas i databasen samt innehålla en titel och en brödtext (VG)
- [ ] Administratörer ska kunna lägga till och ta bort produkter (VG)
