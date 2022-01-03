![Platform Usage?](https://github.com/emreyvz/whois-lookup/blob/main/ScriptGIF.gif?raw=true "Platform Usage")

# Whois Lookup Platform

A free Whois lookup platform in one page with automatic language detection.

Written by Emre Yavuz.


## Dependencies

- Language Detection | **[getInformationFromIP.php](https://github.com/emreyvz/get-information-from-ip)**
- Toast | **[Toastify](https://github.com/apvarun/toastify-js)**


## Whois API

Get API Key from **[promptapi.com](https://promptapi.com/marketplace/description/whois-api)** and change API_KEY with new one at js/functions.js:29

```javascript
url: "https://api.promptapi.com/whois/query?domain=" + url,
data: { "apikey": "YOUR_APIKEY" },
type: "GET",
beforeSend: function(xhr){xhr.setRequestHeader('apikey', 'YOUR_APIKEY');},
```

## Languages

Simply add new language code as key to assets/languages.json object like shown below

```json
   "EN" : {
        "page_title": "Free Whois Lookup",
        "type_site_address_1" : "Enter a ",
        "type_site_address_2" : "domain name or IP Address",
        "type_site_address_3" : "for lookup",
        "dummy_site_address": "johndoe.com",
        "query_text": "Search",
        "sitename_details": "Details",
        "domain": "DOMAIN",
        "registrar": "REGISTRAR",
        "expiration_date": "EXPIRATION DATE",
        "nameservers": "NAMESERVERS",
        "creation_date": "CREATION DATE",
        "domain_owner": "DOMAIN OWNER",
        "domain_owner_address": "DOMAIN OWNER ADDRESS",
        "domain_owner_country": "DOMAIN OWNER COUNTRY",
        "go_back": "Go back",
        "domain_is_not_valid": "Domain name is not valid"
    }
```

## License & Attribution

<img src="https://opensource.org/files/osi_keyhole_300X300_90ppi_0.png" height="24" width="24">

- Thanks George Francis for design idea | **[Generative UI](https://codepen.io/georgedoescode/details/XWNmvro)**
- **[Apache 2.0 License](https://www.apache.org/licenses/LICENSE-2.0)**
- 2022 © Emre Yavuz
