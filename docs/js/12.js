(window.webpackJsonp=window.webpackJsonp||[]).push([[12],{363:function(e,a,o){"use strict";o.r(a);var t=o(42),i=Object(t.a)({},(function(){var e=this,a=e.$createElement,o=e._self._c||a;return o("ContentSlotsDistributor",{attrs:{"slot-key":e.$parent.slotKey}},[o("h1",{attrs:{id:"upgrade-guide"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrade-guide"}},[e._v("#")]),e._v(" Upgrade Guide")]),e._v(" "),o("p",[e._v("Before starting upgrade we recommenced to backup your files and export your current database.")]),e._v(" "),o("p",[o("strong",[e._v("NOTE : If you are non-technical person then please use dist.zip to replace files and if you are technical person then use src.zip")])]),e._v(" "),o("h2",{attrs:{id:"upgrade-to-latest-version"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrade-to-latest-version"}},[e._v("#")]),e._v(" Upgrade to latest version")]),e._v(" "),o("h3",{attrs:{id:"upgrading-from-v2-2-0-to-v3-0-0"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrading-from-v2-2-0-to-v3-0-0"}},[e._v("#")]),e._v(" Upgrading from v2.2.0 to v3.0.0")]),e._v(" "),o("h4",{attrs:{id:"for-technical-users"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-technical-users"}},[e._v("#")]),e._v(" For Technical Users:")]),e._v(" "),o("ul",[o("li",[o("p",[e._v("Download "),o("code",[e._v("v3.0.0")])])]),e._v(" "),o("li",[o("p",[e._v("Backup you current version files and DB")])]),e._v(" "),o("li",[o("p",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")])]),e._v(" "),o("li",[o("p",[e._v("Replace "),o("code",[e._v("v3.0.0")]),e._v(" files into your existing version "),o("code",[e._v("v2.2.0")])])]),e._v(" "),o("li",[o("p",[e._v("Run "),o("code",[e._v("composer install")]),e._v(" to update composer dependencies")])]),e._v(" "),o("li",[o("p",[e._v("Run "),o("code",[e._v("php artisan migrate")]),e._v(" to update composer dependencies")])]),e._v(" "),o("li",[o("p",[e._v("Run "),o("code",[e._v("php artisan db:seed --class=AddRegionCodeInSettingsSeeder")])])]),e._v(" "),o("li",[o("p",[e._v("Run "),o("code",[e._v("npm install")])])]),e._v(" "),o("li",[o("p",[e._v("And at last Run "),o("code",[e._v("npm run dev")]),e._v(" to make new build")])]),e._v(" "),o("li",[o("p",[e._v("You have to update following env's.")]),e._v(" "),o("ul",[o("li",[o("p",[e._v("Set facebook social login, "),o("a",{attrs:{href:"https://magefan.com/blog/create-facebook-application",target:"_blank",rel:"noopener noreferrer"}},[e._v("reference link"),o("OutboundLink")],1)])]),e._v(" "),o("li",[o("p",[e._v("Set google social login, "),o("a",{attrs:{href:"https://theonetechnologies.com/blog/post/how-to-get-google-app-client-id-and-client-secret",target:"_blank",rel:"noopener noreferrer"}},[e._v("reference link"),o("OutboundLink")],1),e._v(" or you can watch video at "),o("a",{attrs:{href:"https://www.youtube.com/watch?v=sPlY-Sr2fFg&feature=youtu.be",target:"_blank",rel:"noopener noreferrer"}},[e._v("here"),o("OutboundLink")],1)]),e._v(" "),o("p",[e._v("GOOGLE_CLIENT_ID=\nGOOGLE_CLIENT_SECRET=\nGOOGLE_REDIRECT={APP_URL}/login/google/callback")]),e._v(" "),o("p",[e._v("FACEBOOK_APP_ID=\nFACEBOOK_APP_SECRET=\nFACEBOOK_REDIRECT={APP_URL}/login/facebook/callback")])])])]),e._v(" "),o("li",[o("p",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v3.0.0")])])])]),e._v(" "),o("h4",{attrs:{id:"for-non-technical-users"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-non-technical-users"}},[e._v("#")]),e._v(" For Non Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v3.0.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v3.0.0")]),e._v(" files/directories into your existing version "),o("code",[e._v("v2.2.0")])]),e._v(" "),o("li",[e._v("Update database :\n"),o("ul",[o("li",[e._v("Open your phpMyAdmin")]),e._v(" "),o("li",[e._v("Go to your database and select import tab.")]),e._v(" "),o("li",[e._v("Now in the latest version go to "),o("code",[e._v("app/database/releases/v3.0.0/")]),e._v(" you can find "),o("code",[e._v("v3.0.0")]),e._v(".sql")]),e._v(" "),o("li",[e._v("Select that sql file and import it.")])])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v3.0.0")])])]),e._v(" "),o("h3",{attrs:{id:"upgrading-from-v2-1-0-to-v2-2-0"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrading-from-v2-1-0-to-v2-2-0"}},[e._v("#")]),e._v(" Upgrading from v2.1.0 to v2.2.0")]),e._v(" "),o("h4",{attrs:{id:"for-technical-users-2"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-technical-users-2"}},[e._v("#")]),e._v(" For Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v2.2.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v2.2.0")]),e._v(" files into your existing version "),o("code",[e._v("v2.1.0")])]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("composer install")]),e._v(" to update composer dependencies")]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("php artisan migrate")]),e._v(" to update composer dependencies")]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("npm install")])]),e._v(" "),o("li",[e._v("And at last Run "),o("code",[e._v("npm run dev")]),e._v(" to make new build")]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v2.2.0")])])]),e._v(" "),o("h4",{attrs:{id:"for-non-technical-users-2"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-non-technical-users-2"}},[e._v("#")]),e._v(" For Non Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v2.2.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v2.2.0")]),e._v(" files/directories into your existing version "),o("code",[e._v("v2.1.0")])]),e._v(" "),o("li",[e._v("Update database :\n"),o("ul",[o("li",[e._v("Open your phpMyAdmin")]),e._v(" "),o("li",[e._v("Go to your database and select import tab.")]),e._v(" "),o("li",[e._v("Now in the latest version go to "),o("code",[e._v("app/database/releases/v2.2.0/")]),e._v(" you can find "),o("code",[e._v("v2.2.0")]),e._v(".sql")]),e._v(" "),o("li",[e._v("Select that sql file and import it.")])])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v2.1.0")])])]),e._v(" "),o("h4",{attrs:{id:"for-technical-users-3"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-technical-users-3"}},[e._v("#")]),e._v(" For Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v2.1.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v2.1.0")]),e._v(" files into your existing version "),o("code",[e._v("v2.0.0")])]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("composer install")]),e._v(" to update composer dependencies")]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("php artisan migrate")]),e._v(" to update composer dependencies")]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("npm install")])]),e._v(" "),o("li",[e._v("And at last Run "),o("code",[e._v("npm run dev")]),e._v(" to make new build")]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v2.1.0")])])]),e._v(" "),o("h4",{attrs:{id:"for-non-technical-users-3"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-non-technical-users-3"}},[e._v("#")]),e._v(" For Non Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v2.1.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v2.1.0")]),e._v(" files/directories into your existing version "),o("code",[e._v("v2.0.0")])]),e._v(" "),o("li",[e._v("Update database :\n"),o("ul",[o("li",[e._v("Open your phpMyAdmin")]),e._v(" "),o("li",[e._v("Go to your database and select import tab.")]),e._v(" "),o("li",[e._v("Now in the latest version go to "),o("code",[e._v("app/database/releases/v2.1.0/")]),e._v(" you can find "),o("code",[e._v("v2.1.0")]),e._v(".sql")]),e._v(" "),o("li",[e._v("Select that sql file and import it.")])])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v2.1.0")])])]),e._v(" "),o("h3",{attrs:{id:"upgrading-from-v1-0-2-to-v2-0-0"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrading-from-v1-0-2-to-v2-0-0"}},[e._v("#")]),e._v(" Upgrading from v1.0.2 to v2.0.0")]),e._v(" "),o("h4",{attrs:{id:"for-technical-users-4"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-technical-users-4"}},[e._v("#")]),e._v(" For Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v2.0.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v2.0.0")]),e._v(" files into your existing version "),o("code",[e._v("v1.0.2")])]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("composer install")]),e._v(" to update composer dependencies")]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("npm install")])]),e._v(" "),o("li",[e._v("And at last Run "),o("code",[e._v("npm run dev")]),e._v(" to make new build")]),e._v(" "),o("li",[e._v("Now you have to set up the stripe payment env for make the stripe subscription working.\n"),o("ul",[o("li",[o("p",[e._v("You have yo update following env")]),e._v(" "),o("div",{staticClass:"language- extra-class"},[o("pre",[o("code",[e._v("   STRIPE_KEY=\n   STRIPE_SECRET_KEY=\n   STRIPE_WEBHOOK_SECRET_KEY=\n")])])])]),e._v(" "),o("li",[o("p",[e._v("You can find documentation here that how to get values of that env.")]),e._v(" "),o("ul",[o("li",[o("a",{attrs:{href:"https://support.stripe.com/questions/locate-api-keys-in-the-dashboard",target:"_blank",rel:"noopener noreferrer"}},[e._v("Link 1"),o("OutboundLink")],1)]),e._v(" "),o("li",[o("a",{attrs:{href:"https://help.sharetribe.com/en/articles/1055989-how-to-configure-your-stripe-account-and-get-api-keys-for-your-marketplace",target:"_blank",rel:"noopener noreferrer"}},[e._v("Link 2"),o("OutboundLink")],1)])])]),e._v(" "),o("li",[o("p",[e._v("You have to set webhook URL into stripe, webhook URL should be "),o("code",[e._v("YOUR_APP_URL/subscription-update")]),e._v(".")])])])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v2.0.0")])])]),e._v(" "),o("h4",{attrs:{id:"for-non-technical-users-4"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-non-technical-users-4"}},[e._v("#")]),e._v(" For Non Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v2.0.0")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v2.0.0")]),e._v(" files/directories into your existing version "),o("code",[e._v("v1.0.2")])]),e._v(" "),o("li",[e._v("Update database :\n"),o("ul",[o("li",[e._v("Open your phpMyAdmin")]),e._v(" "),o("li",[e._v("Go to your database and select import tab.")]),e._v(" "),o("li",[e._v("Now in the latest version go to "),o("code",[e._v("app/database/releases/v2.0.0/")]),e._v(" you can find "),o("code",[e._v("v2.0.0")]),e._v(".sql")]),e._v(" "),o("li",[e._v("Select that sql file and import it.")])])]),e._v(" "),o("li",[e._v("Now you have to set up the stripe payment env for make the stripe subscription working.\n"),o("ul",[o("li",[o("p",[e._v("You have yo update following env")]),e._v(" "),o("div",{staticClass:"language- extra-class"},[o("pre",[o("code",[e._v("   STRIPE_KEY=\n   STRIPE_SECRET_KEY=\n   STRIPE_WEBHOOK_SECRET_KEY=\n")])])])]),e._v(" "),o("li",[o("p",[e._v("You can find documentation here that how to get values of that env.")]),e._v(" "),o("ul",[o("li",[o("a",{attrs:{href:"https://support.stripe.com/questions/locate-api-keys-in-the-dashboard",target:"_blank",rel:"noopener noreferrer"}},[e._v("Link 1"),o("OutboundLink")],1)]),e._v(" "),o("li",[o("a",{attrs:{href:"https://help.sharetribe.com/en/articles/1055989-how-to-configure-your-stripe-account-and-get-api-keys-for-your-marketplace",target:"_blank",rel:"noopener noreferrer"}},[e._v("Link 2"),o("OutboundLink")],1)])])]),e._v(" "),o("li",[o("p",[e._v("You have to set webhook URL into stripe, webhook URL should be "),o("code",[e._v("YOUR_APP_URL/subscription-update")]),e._v(".")])])])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v2.0.0")])])]),e._v(" "),o("h3",{attrs:{id:"upgrading-from-v1-0-0-to-v1-0-2"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrading-from-v1-0-0-to-v1-0-2"}},[e._v("#")]),e._v(" Upgrading from v1.0.0 to v1.0.2")]),e._v(" "),o("h4",{attrs:{id:"for-technical-users-5"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-technical-users-5"}},[e._v("#")]),e._v(" For Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v1.0.2")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v1.0.2")]),e._v(" files into your existing version "),o("code",[e._v("v1.0.1")])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v1.0.2")])])]),e._v(" "),o("h4",{attrs:{id:"for-non-technical-users-5"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-non-technical-users-5"}},[e._v("#")]),e._v(" For Non Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v1.0.2")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v1.0.2")]),e._v(" files/directories into your existing version "),o("code",[e._v("v1.0.1")])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v1.0.2")])])]),e._v(" "),o("h3",{attrs:{id:"upgrading-from-v1-0-0-to-v1-0-1"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#upgrading-from-v1-0-0-to-v1-0-1"}},[e._v("#")]),e._v(" Upgrading from v1.0.0 to v1.0.1")]),e._v(" "),o("h4",{attrs:{id:"for-technical-users-6"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-technical-users-6"}},[e._v("#")]),e._v(" For Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v1.0.1")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v1.0.1")]),e._v(" files into your existing version "),o("code",[e._v("v1.0.0")])]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("composer install")]),e._v(" to update composer dependencies")]),e._v(" "),o("li",[e._v("Run "),o("code",[e._v("npm install")])]),e._v(" "),o("li",[e._v("And at last Run "),o("code",[e._v("npm run dev")]),e._v(" to make new build")]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v1.0.1")])])]),e._v(" "),o("h4",{attrs:{id:"for-non-technical-users-6"}},[o("a",{staticClass:"header-anchor",attrs:{href:"#for-non-technical-users-6"}},[e._v("#")]),e._v(" For Non Technical Users:")]),e._v(" "),o("ul",[o("li",[e._v("Download "),o("code",[e._v("v1.0.1")])]),e._v(" "),o("li",[e._v("Backup you current version files and DB")]),e._v(" "),o("li",[e._v("If you have manually changed any files then please take a backup of them. After replacing files, you can again get that portion of code into some particular files.")]),e._v(" "),o("li",[e._v("Replace "),o("code",[e._v("v1.0.1")]),e._v(" files/directories into your existing version "),o("code",[e._v("v1.0.0")])]),e._v(" "),o("li",[e._v("That's it!, you are ready to go with new version "),o("code",[e._v("v1.0.1")])])])])}),[],!1,null,null,null);a.default=i.exports}}]);