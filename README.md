## Todo

https://marmelab.com/phpunit-d3-report/

[ ] Web
[ ] Api
    [ ] Auth
        [ ] ApiTokens
        [ ] JWT
        [ ] Passport (OAuth2)
            [ ] SSO - AccessToken Grant
            [ ] Password Grant
        [ ] Sanctum (ex Airlock)
    [ ] Api Resources // Transformer
[x] Repository pattern
    [x] condividere codice fra web e api
    [x] Interfacce
[x] Custom Namespaces
[x] UUID
[ ] Impostazione test suite coverage
    [x] pcov
    [x] custom exception formatter
    [x] mail sending
    [ ] job queing
    [ ] event firing
    [ ] middleware execution
[ ] Different Auth Guard


DbCenrale
entita1.acme.com/api/
entita2.acme.com/api/

acme.com/api/offers - JWT
User
Offer - GlobalScope (user_id = auth()->id())
