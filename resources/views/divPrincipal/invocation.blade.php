<div id="portalList" class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Portal List</div>
        <div id="portalListContent" class="text-gray-700 text-base">
        </div>
    </div>
</div>

<div id="monsterList" class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">Monster List</div>
        <div id="monsterListContent" class="text-gray-700 text-base">
        </div>
    </div>
</div>

<div>
    <button data-type="5" onclick="test()" id="openPortalButton"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Open Portal
    </button>
    <div id="area"></div>
</div>
<style>

    #area {
        border: 1px solid black;
        padding: 30px;
        margin-top: 30px;
    }

    .reward {
        display: inline-block;
        border: 1px solid black;
        margin: 0 10px 10px 0;
        width: 100px;
        height: 130px;
        padding: 5px;
        vertical-align: top;
        opacity: 0;
        transition: transform 0.4s linear 0.4s, opacity 1s linear 0.4s;
        position: relative;
        transform: scale(0.2) translate(-400px, -200px);

        &.show {
            opacity: 1;
            transform: scale(1);
        }

        &:after {
            content: '';
            width: 100%;
            height: 30px;
            display: block;
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: rgba(white, 0.5);
        }
    }

    .reward-common {
        box-shadow: 0 0 5px 0 green;
        border: 1px solid white;
    }

    .reward-rare {
        box-shadow: 0 0 10px 0 blue;
        border: 1px solid white;

    }

    .reward-epic {
        box-shadow: 0 0 15px 2px purple;
        border: 1px solid white;
    }

    .reward-legendary {
        box-shadow: 0 0 30px 6px darkorange;
        border: 1px solid white;
    }
</style>
<script>
    var rarities = [
        'uncommon',
        'common',
        'rare',
        'epic',
        'legendary'
    ]

    var jsPortal = [{
        "name": "Portal 1",
        "id": "1",
        "price": "100",
        "monstres": [
            {
                "id": 1,
                "rarity": 1,
                "probability": 0.6,
                "probability_rarity_plus": 50
            },
            {
                "id": 2,
                "rarity": 2,
                "probability": 0.2,
                "probability_rarity_plus": 30
            },
            {
                "id": 3,
                "rarity": 3,
                "probability": 0.1,
                "probability_rarity_plus": 15
            },
            {
                "id": 4,
                "rarity": 4,
                "probability": 0.08,
                "probability_rarity_plus": 5
            },
            {
                "id": 5,
                "rarity": 5,
                "probability": 0.02,
                "probability_rarity_plus": 0
            }
        ]
    },
    {
        "name": "Portal 2",
        "id": "2",
        "price": "200",
        "monstres": [
            {
                "id": 1,
                "rarity": 1,
                "probability": 1,
                "probability_rarity_plus": 50
            },
            {
                "id": 2,
                "rarity": 2,
                "probability": 0,
                "probability_rarity_plus": 30
            }
        ]
    }
    ]
    window.onload = onload();

    function onload() {
        var portalListContent = document.getElementById("portalListContent");
        var portalList = document.getElementById("portalList");

        jsPortal.forEach(portal => {
            // Crée un conteneur pour le portail et le tableau
            var portalContainer = document.createElement("div");
            portalContainer.className = "portal-container bg-gray-200 p-4 my-4 rounded-lg";

            var portalDiv = document.createElement("div");
            portalDiv.className = "flex justify-between items-center mb-4";
            portalDiv.innerHTML = "<div class='text-lg font-bold'>" + portal.name + "</div><div class='text-lg font-bold text-red-500 cursor-pointer'>" + portal.price + " <i class='fas fa-gem'></i></div>";
            portalContainer.appendChild(portalDiv);

            // Crée un tableau pour les monstres
            var monsterTable = document.createElement("table");
            monsterTable.className = "w-full text-center";
            portal.monstres.forEach(monster => {
                var row = document.createElement("tr");
                var nameCell = document.createElement("td");
                nameCell.textContent = "Monster_" + monster.id;
                var probabilityCell = document.createElement("td");
                probabilityCell.textContent = monster.probability * 100 + "%";
                row.appendChild(nameCell);
                row.appendChild(probabilityCell);
                monsterTable.appendChild(row);
            });
            portalContainer.appendChild(monsterTable);

            portalListContent.appendChild(portalContainer);
            portalDiv.onclick = function () {
                // openPortal(portal);
                getRandomItem(portal);
            }
        });
    }
    function showMonster(monster) {
        var monsterListContent = document.getElementById("monsterListContent");
        var monsterDiv = document.createElement("div");
        monsterDiv.className = "flex justify-between";
        monsterDiv.innerHTML = "<div> Monster_" + monster.id + "</div><div>" + monster.rarity + "</div>";
        monsterListContent.appendChild(monsterDiv);
    }

    function openPortal(portal) {
        var monsters = portal.monstres;
        var random = Math.random(); // Génère un nombre aléatoire entre 0 et 1

        console.log("Random number: " + random);
        var cumulativeProbability = 0;
        for (var i = 0; i < monsters.length; i++) {
            cumulativeProbability += monsters[i].probability;
            if (random <= cumulativeProbability) {
                console.log("You got a monster with id " + monsters[i].id);
                showMonster(monsters[i]);
                return;
            }
        }
    }


    var button = document.querySelectorAll('#openPortalButton');
    var area = document.querySelector('#area');

    function test(portal) {
        var monsters = portal.monstres;
        var rewardList = [];
        var numOfItems = 10;
        // new block
        for (var i = 0; i < numOfItems; i++) {
            var random = Math.random(); // Génère un nombre aléatoire entre 0 et 1

            var cumulativeProbability = 0;
            for (var j = 0; j < monsters.length; j++) {
                cumulativeProbability += monsters[j].probability;
                if (random <= cumulativeProbability) {
                    rewardList.push(monsters[j]);
                    break;
                }
            }
        }
        printHTML(rewardList);
    }

    function getRandomItem(portal) {
        var items = portal.monstres;
        var totalProbability = 0;
        var rewardList = [];
        var numOfItems = 10;
        // Calculez la somme totale des probabilités
        for (var i = 0; i < items.length; i++) {
            totalProbability += items[i].probability;
        }

        for (var j = 0; j < numOfItems; j++) {

            // Générez un nombre aléatoire entre 0 et la somme totale
            var random = Math.random() * totalProbability;
            console.log(totalProbability);

            // Parcourez la liste pour trouver l'élément sélectionné
            for (var i = 0; i < items.length; i++) {
                if (random < items[i].probability) {
                    console.log(items[i].probability);
                    console.log(random);
                    rewardList.push(items[i]);
                    break;
                }
                random -= items[i].probability;
            }
        }
        printHTML(rewardList);
    }

    function printHTML(item) {
        area.innerHTML = '';
        var content = document.createElement('div');

        for (var i = 0; i < item.length; i++) {
            var innerContent = document.createElement('div');
            var type = document.createElement('div');
            var name = document.createElement('div');
            var type2 = document.createElement('div');


            rarityClass = '';
            rarityClass = 'reward-' + rarities[item[i].rarity - 1];

            name.textContent = "Monstre_" + item[i].id;
            innerContent.appendChild(name);

            innerContent.classList.add('reward', rarityClass);

            content.appendChild(innerContent);
        }

        area.appendChild(content);

        var item = area.querySelectorAll('.reward');
        var i = 0;

        setInterval(function () {
            if (i < item.length) {
                item[i].classList.add('show');
                i++;
            }
        }, 200);
    }

    function getRandom(x) {
        return Math.floor(Math.random() * x) + 1;
    }

</script>