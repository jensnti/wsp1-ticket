# wsp1-ticket

Denna uppgift förutsätter att du har följt instruktionerna i WSL dokumentet.

Material för php grunder och test.

Clona detta repo från github classroom.

    cd
    cd code
    git clone https://github.com/NTIG-Umea/webbserver-ticket-GITUSERNAME

Skapa 2 directories

    cd webbserver-ticket-GITUSERNAME
    mkdir tests
    mkdir src

Kör [composer](https://getcomposer.org/) install

Om det strular så kan du behöva installera några saker för att få igång [phpunit](https://phpunit.de/)

    sudo apt install composer
    sudo apt install php-xml
    sudo apt install php-mbstring

    sudo phpenmod xml
    sudo phpenmod mbstring

Sedan borde du kunna köra(i repomappen)

    composer install

Testerna kör du med

    composer test

Får du felet att Ticket klassen inte hittas så kör

    composer dump-autoload

## Ticket class och TicketTest

I src mappen så kommer vi att skapa en klass, Ticket.
Ticket ska användas för att skapa biljetter och räkna ut priset för dessa.

TicketTest är våra phpunit-tester för att kontrollera att allt fungerar som tänkt.

## v.15

Vi ska nu arbeta med att faktiskt använda klassen i ett webbkontext och inte bara köra den från cmdline eller med tester.
Detta så att vi nu kan komma tillbaks till att jobba med [REST](https://sv.wikipedia.org/wiki/Representational_State_Transfer).
Din klass bör fungera nu och testerna bör vara gröna så att du kan använda den (se classroom för hemuppgift).

Det viktigaste är att din Ticket klass nu kan ta emot ett födelsedatum, räkna ut åldern och sedan priset.

    setBirthdate(YYYY-MM-DD)
    calculateAge() // Räkna ut och sätt $this->age
    calculatePrice() // Använd $this->age och spara $this->price
    getPrice() // svara med $this->price

För att förbereda det vi ska göra nu så behöver vi köra igång apache och se till att vi kan komma åt det vårt arbete.

### Setup

Börja med att starta [apache](https://www.apache.org/)

    sudo service apache2 restart

Funkar inte apache, så måste ni kolla i dokumentet Utvecklarmiljö WSL hur ni ändrar port / felsöker
Detsamma gäller för att få php att fungera med user directories, ni behöver det.

Gå sedan in i det här projectets root

    cd
    cd code
    cd webbserver-ticket-GITUSER

Här ska vi skapa en public mapp som kommer vara det som "finns" på webbservern

    mkdir public

Gå sedan in i din public_html mapp, i ditt hem directory

    cd
    cd public_html

Skapa en länk till ticket public

    ln -s ../code/webbserver-ticket-GITUSER/public ticket

Kolla så att det fungerade

    ls -la
    cd ticket

Gå sedan tillbaka till projektets root och starta Visual studio code.

I public mappen kommer vi så behöva två filer och eventuell css/img/js

    css/style.css
    index.html
    api.php

## AJAX, Asynchronous Javascript And XML

Vi ska inte syssla med XML, få gör det nuförtiden och namnet [AJAX](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX) kanske är på väg ut, det heter egentligen
heter det [XMLHttpRequests](https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest). Vilket inte heller låter oss undslippa namnet XML.

Hursomhelst så ska vi arbeta med en klient för det här som heter [axios](https://github.com/axios/axios). Den underlättar arbetet med detta avsevärt.

För att komma igång så i er index.html, skapa [html:5](https://docs.emmet.io/cheat-sheet/) grunden och klistra sedan in följande länk innuti head elementet.

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

Det första vi ska göra är att skapa en [GET](https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods/GET) request till vår backend för att se om det fungerar.
Notera att du behöver redigera baseUrl och eventuellt vars get pekar.

    const instance = axios.create({
        baseURL: 'http://localhost/~DINUSER/ticket/',
    });

    instance.get('api.php/?hello')
    .then(function (response) {
        // handle success
        console.log(response);
    })
    .catch(function (error) {
        // handle error
        console.log(error);
    })

När detta är klart så måste vi skapa koden i api.php för att svara på denna request.
Kontrollera om hello är satt, [filtrera](https://www.php.net/manual/en/function.filter-input.php) om det behövs. Vi kan sedan använda värdet för att svara med [JSON](https://en.wikipedia.org/wiki/JSON).

    if (isset($_GET['hello'])) {
        $msg = ["msg" => "Hello world!"];
        header('Content-type: application/json');
        echo json_encode($msg);
    }

Spara. Kör. Kolla i console samt network tab.

## Skapa POST request och använd Ticket

För den här delen så behöver vi först skapa ett formulär där vi kan mata in
antal biljetter samt köparens födelsedatum.

När vi sedan skickat detta formulär så kommer vi att med javascript stoppa att det skickas.
Vi kommer sedan att ta formulärdatan och skicka den till vår backend med hjälp av axios.

Javascript delen kommer att se ut ungefär såhär. Men vi kommer att behöva att välja element
ur vårt dokument innan vi kan använda det.

    form.addEventListener('submit', (el) => {
        el.preventDefault();

        let data = new FormData(form);

        instance.post('api.php', data)
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
    })

Det som återstår då är att skapa en route i vår backend som tar emot formdatan och skapar Tickets
från den.

För att hjälpa oss att testa detta så kan vi använda ett program som heter [Postman](https://www.postman.com/). 
Postman låter oss skriva requests och skicka dem, inspektera svar osv. Det kan vara mycket hjälpsamt när vi 
felsöker och testar en backend/api.

Vi behöver även ägna lite tid åt att förstå [http status koder](https://developer.mozilla.org/sv-SE/docs/Web/HTTP/Status),
något som ni säkert har sett tidigare, 404, 500 osv. Men vad är koden för OK?