<script>

    $.get("{{ Request::root() }}" + "/api/countries", function(countries) {

        // For each letter in the alphabet
        for(var letter = 'A'; letter <= "Z"; letter = nextChar(letter)) {

            var elem = document.createElement("li");
            var a = document.createElement("a");
            elem.appendChild(a);
            a.innerHTML = letter;

            for(var i = 0; i < countries.length; i++) {

                // link to the first country that starts with that letter
                if (countries[i].substring(0,1) == letter) {
                    a.setAttribute("href", "#" + countries[i]);
                    break;
                }
                // or set it disabled if no country was found.
                if (i == countries.length - 1) {
                    elem.setAttribute("class", "disabled");
                }

            }

            document.getElementById("list").appendChild(elem);
        }
    });

    function nextChar(c) {
        return String.fromCharCode(c.charCodeAt(0) + 1);
    }

</script>