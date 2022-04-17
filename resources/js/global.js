data = function () {
    return {
        locale: '',

        setLocale(lang) {
            this.locale = lang;
        },
        getLanguageNumber(lang) {
            switch (lang) {
                case 'he':
                    return 0;
                case 'en':
                    return 1;
                case 'ru':
                    return 2;

            }
        },

    }
}
