

let selectedColors = [];
let selectedNumbers = [];
let sortOrder = 1;
let originalDivs = [];
let originalDivsDetails = [];



function addMonsterToTeam(monster) {
    let json = getData();
    const team = json.Player_Monster.Team;
    if (team.length >= 3) {

        addAlert("warning", "Équipe pleine", "Vous ne pouvez pas avoir plus de 3 monstres dans votre équipe", "", "OK", function () { return removeAlert(); });
        return;
    }
    if (team.includes(monster.id)) {
        addAlert("warning", "" + monster.surname + " déjà dans l'équipe", "Vous avez déjà ce monstre dans votre équipe", "", "OK", function () { return removeAlert(); });
        return;
    }
    else {
        team.push(monster.id);

        localStorage.setItem('data', JSON.stringify(json));
        const monstes = getMonsterList();
        for (let i = 0; i < monstes.length; i++) {
            if (monstes[i].monster_id == monster.monsterId) {
                createMonsterCard(monster, monstes[i], true);
            }
        }
    }
}

function removeMonsterFromTeam(monster) {
    let json = getData();
    const team = json.Player_Monster.Team;
    team.splice(team.indexOf(monster.id), 1);

    localStorage.setItem('data', JSON.stringify(json));
    removeMonsterCard(monster.id, true);
}

function removeAlertFromTeam(monster) {
    addAlert("alert", "Supression de " + monster.surname + " de l'équipe", "Voulez-vous vraiment supprimer " + monster.surname + " de votre équipe?", "", "Oui", function () { removeMonsterFromTeam(monster); return removeAlert(); }, "Non", function () { return removeAlert(); });
}

function loadMyMonstersCard(monsters) {
    const json = getData();
    const monstersJson = json.Player_Monster.Monsters;

    monstersJson.forEach(monsterJson => {
        monsters.forEach(monster => {
            if (monster.monster_id == monsterJson.monsterId) {
                createMonsterCard(monsterJson, monster, false);
            }
        });
    });
}

function loadMyTeamCard(monsters) {

    const json = getData();
    const teamJson = json.Player_Monster.Team;
    const monstersJson = json.Player_Monster.Monsters;

    teamJson.forEach(monsterId => {
        monstersJson.forEach(monsterJson => {
            if (monsterJson.id == monsterId) {
                monsters.forEach(monster => {
                    if (monster.monster_id == monsterJson.monsterId) {
                        createMonsterCard(monsterJson, monster, true);
                    }
                });
            }
        });
    });
}

function createMonsterCard(monsterJson, monster, team) {
    const myDiv = team ? document.getElementById("mp_monsterTeam") : document.getElementById("mp_myMonster");

    let classes = `flex flex-col items-center justify-center w-full max-w-sm mx-auto rarity--${monsterJson.rarity}`;
    monster.monster_types.forEach(monsterType => {
        classes += ` type--${monsterType.type.monster_id_Type}`;
    });

    const cardMonster = document.createElement("div");
    cardMonster.id = team ? `cardMonsterEquip${monsterJson.id}` : `cardMonster${monsterJson.id}`;
    cardMonster.className = classes;

    const monsterImage = document.createElement("div");
    monsterImage.className = "w-full h-64 bg-center bg-cover rounded-lg shadow-md";
    monsterImage.style.backgroundImage = `url(${monster.image})`;

    const monsterInfo = document.createElement("div");
    monsterInfo.className = "w-full -mt-10 overflow-auto rounded-lg shadow-lg bg-gray-100";

    const monsterName = document.createElement("h3");
    monsterName.id = "monsterName";
    monsterName.className = "py-2 font-bold tracking-wide text-center uppercase text-gray-800 overflow-ellipsis whitespace-nowrap";
    monsterName.innerHTML = monsterJson.surname + " - Lvl: " + monsterJson.level;

    const hiddenLvl = document.createElement("h4");
    hiddenLvl.id = "hiddenLvl";
    hiddenLvl.textContent = monsterJson.level;
    hiddenLvl.className = "hidden";


    const monsterDetails = document.createElement("div");
    monsterDetails.className = "flex items-center justify-evenly px-3 py-2 bg-gray-200";

    const monsterButton = document.createElement("button");
    monsterButton.className = "px-2 py-1 text-xs font-semibold text-black uppercase transition-colors duration-300 transform bg-gray-300 rounded hover:bg-gray-400 focus:bg-gray-400 focus:outline-none";
    monsterButton.textContent = "Informations";
    monsterButton.id = "monsterButton";
    monsterButton.onclick = function () {
        showCard(monsterJson.id, team);
    };

    monsterDetails.appendChild(monsterButton);

    monsterInfo.appendChild(monsterName);
    monsterInfo.appendChild(monsterDetails);
    monsterInfo.appendChild(hiddenLvl);

    cardMonster.appendChild(monsterImage);
    cardMonster.appendChild(monsterInfo);

    // Details card for the monster
    const cardMonsterDetails = document.createElement("div");
    cardMonsterDetails.id = team ? `cardMonsterEquip${monsterJson.id}Details` : `cardMonster${monsterJson.id}Details`;
    cardMonsterDetails.className = "flex flex-col items-center justify-center w-full max-w-sm mx-auto hidden";

    const divMonsterImage = document.createElement("div");
    divMonsterImage.className = "w-full h-64 bg-center bg-cover rounded-lg shadow-md";
    divMonsterImage.style.backgroundImage = `url(${monster.image})`;

    const divMonsterInfo = document.createElement("div");
    divMonsterInfo.className = "px-6 py-4 mx-3 flex flex-col items-center justify-center bg-white bg-opacity-85 rounded mx-auto my-2";

    const divMonsterName = document.createElement("h1");
    divMonsterName.className = "text-xl font-semibold text-gray-800 overflow-hidden whitespace-nowrap";
    divMonsterName.textContent = monster.name + " - Lvl: " + monsterJson.level;

    const crosshairs = document.createElement("div");
    crosshairs.className = "flex items-center mt-4 text-gray-800";
    crosshairs.innerHTML = `<i class="fa-solid fa-crosshairs fa-lg pr-2"></i><h1 class="px-2 text-sm"><i class="fa-solid fa-arrow-right"></i> ${formatNumber(monsterJson.atk)}</h1>`;

    const shield = document.createElement("div");
    shield.className = "flex items-center mt-4 text-gray-800";
    shield.innerHTML = `<i class="fa-solid fa-shield-halved fa-lg pr-2"></i><h1 class="px-2 text-sm"><i class="fa-solid fa-arrow-right"></i> ${formatNumber(monsterJson.def)}</h1>`;

    const heart = document.createElement("div");
    heart.className = "flex items-center mt-4 text-gray-800";
    heart.innerHTML = `<i class="fa-solid fa-heart fa-lg pr-2"></i><h1 class="px-2 text-sm"><i class="fa-solid fa-arrow-right"></i> ${formatNumber(monsterJson.hp)}</h1>`;

    const wind = document.createElement("div");
    wind.className = "flex items-center mt-4 text-gray-800";
    wind.innerHTML = `<i class="fa-solid fa-wind fa-lg pr-2"></i><h1 class="px-2 text-sm"><i class="fa-solid fa-arrow-right"></i> ${formatNumber(monsterJson.speed)}</h1>`;


    const hiddenLvl2 = document.createElement("h3");
    hiddenLvl2.id = "hiddenLvl2";
    hiddenLvl2.textContent = monsterJson.level;
    hiddenLvl2.className = "hidden";
    divMonsterInfo.appendChild(hiddenLvl2);

    divMonsterInfo.appendChild(divMonsterName);
    divMonsterInfo.appendChild(crosshairs);
    divMonsterInfo.appendChild(shield);
    divMonsterInfo.appendChild(heart);
    divMonsterInfo.appendChild(wind);

    const monsterInfoContainer = document.createElement("div");
    monsterInfoContainer.className = "w-full -mt-10 overflow-auto rounded-lg shadow-lg bg-gray-100";

    const monsterInfoHeader = document.createElement("h3");
    monsterInfoHeader.className = "py-2 font-bold tracking-wide text-center uppercase text-gray-800";
    monsterInfoHeader.textContent = monsterJson.surname + " Info ";

    const closeButton = document.createElement("button");
    closeButton.id = "closeButton";
    closeButton.onclick = function () {
        hideCard(monsterJson.id, team);
    };
    closeButton.className = "px-2 py-1 text-xs font-semibold text-gray-800 uppercase transition-colors duration-300 transform rounded hover:bg-gray-300 focus:bg-gray-300 focus:outline-none";
    closeButton.innerHTML = '<i class="fa-solid fa-square-xmark fa-xl text-red-500"></i>';
    monsterInfoHeader.appendChild(closeButton);

    const monsterIdContainer = document.createElement("div");
    monsterIdContainer.className = "flex items-center justify-evenly px-3 py-2 bg-gray-200";

    const addButton = document.createElement("button");
    addButton.className = "px-2 py-1 text-xs font-semibold text-black uppercase transition-colors duration-300 transform bg-gray-300 rounded hover:bg-gray-400 focus:bg-gray-400 focus:outline-none";
    addButton.id = "addButton";
    if (team) {
        addButton.innerHTML = `Exlure <i class="fa-solid fa-circle-minus text-red-700"></i>`;
        addButton.onclick = function () {
            removeAlertFromTeam(monsterJson);
        }
    }
    else {
        addButton.innerHTML = `Ajouter <i class="fa-solid fa-circle-plus text-green-500"></i>`;
        addButton.onclick = function () {
            addMonsterToTeam(monsterJson);
        }
    }
    const moreInfoButton = document.createElement("button");
    moreInfoButton.className = "px-2 py-1 text-xs font-semibold text-black uppercase transition-colors duration-300 transform bg-gray-300 rounded hover:bg-gray-400 focus:bg-gray-400 focus:outline-none";
    moreInfoButton.id = "moreInfoButton";
    moreInfoButton.innerHTML = `Plus d'info <i class="fa-solid fa-info-circle text-blue-500"></i>`;
    moreInfoButton.onclick = function () {
        loadMyMonsterInfo(this, monsterJson);
    }


    monsterIdContainer.appendChild(addButton);
    monsterIdContainer.appendChild(moreInfoButton);

    monsterInfoContainer.appendChild(monsterInfoHeader);
    monsterInfoContainer.appendChild(monsterIdContainer);
    divMonsterImage.appendChild(divMonsterInfo);
    cardMonsterDetails.appendChild(divMonsterImage);
    cardMonsterDetails.appendChild(monsterInfoContainer);

    myDiv.appendChild(cardMonster);
    myDiv.appendChild(cardMonsterDetails);


}

function removeMonsterCard(monsterId, team) {
    const card = team ? document.getElementById(`cardMonsterEquip${monsterId}`) : document.getElementById(`cardMonster${monsterId}`);
    const cardDetails = team ? document.getElementById(`cardMonsterEquip${monsterId}Details`) : document.getElementById(`cardMonster${monsterId}Details`);

    card.remove();
    cardDetails.remove();
}

function showMonsterInfo(element, monster) {
    resetMonsterInfo();
    displayInfoDiv(element);

    let isMyMonster = element.id == "moreInfoButton";
    let baseMonster = getMonsterList().find(monsterall => monsterall.monster_id == monster.monster_id);
    let id = baseMonster.monster_id;

    if (id < 10) {
        id = "00" + id;
    }
    else if (id < 100) {
        id = "0" + id;
    }
    // RARITY

    let rarity = isMyMonster ? monster.rarity : monster.base_rarity;
    const fullStars = '<i class="fa-solid fa-star fa-sm"></i>';
    const emptyStars = '<i class="fa-regular fa-star fa-sm"></i>';

    const divRarity = document.getElementById("rarity");
    divRarity.innerHTML = "";
    let newdoc = document.createElement("a");

    let rarities = getRarities();
    const color = rarities[rarity - 1].color;
    let colorClasses = color.trim().split(' ');
    newdoc.classList.add("flex", "items-center", colorClasses);
    for (let i = 0; i < rarity; i++) {
        newdoc.innerHTML += fullStars;
    }
    for (let i = rarity; i < 5; i++) {
        newdoc.innerHTML += emptyStars;
    }
    divRarity.appendChild(newdoc);

    // TYPE
    const divType = document.getElementById("type");
    divType.innerHTML = "";
    baseMonster.monster_types.forEach(type => {
        const span = document.createElement("span");
        span.style.color = type.type.color;
        span.style.border = "2px solid " + type.type.color;
        span.style.borderRadius = "5px";
        span.textContent = type.type.nameType;
        divType.appendChild(span);
    });
    // NAME AND DESCRIPTION
    document.getElementById("numero").innerHTML = `Astars #${id}`;
    if (isMyMonster && monster.isVariant) {
        document.getElementById("image").src = baseMonster.image_variant;
        document.getElementById("isVariant").classList.remove('hidden')
    }
    else {
        document.getElementById("image").src = baseMonster.image;
        document.getElementById("isVariant").classList.add('hidden')
    }
    document.getElementById("variant").src = baseMonster.image_variant;
    document.getElementById("name").innerHTML = baseMonster.name;
    document.getElementById("description").innerHTML = baseMonster.description;

    // STATS
    let lvl = isMyMonster ? monster.level : 'max';
    document.getElementById("lvl").innerHTML = lvl;
    document.getElementById("statAtkBase").innerHTML = formatNumber(baseMonster.base_attack);
    document.getElementById("statDefBase").innerHTML = formatNumber(baseMonster.base_defense);
    document.getElementById("statHpBase").innerHTML = formatNumber(baseMonster.base_hp);
    document.getElementById("statSpeedBase").innerHTML = formatNumber(baseMonster.base_speed);

    if (isMyMonster) {
        document.getElementById("level").innerHTML = `LVL-${monster.level}`;
        document.getElementById("favBtn").classList.remove('hidden');

        if (monster.isFavorite) {
            document.getElementById("favHearth").classList.remove("fa-regular");
            document.getElementById("favHearth").classList.add("fa-solid", "text-red-500");
        }
        else {
            document.getElementById("favHearth").classList.remove("fa-solid", "text-red-500");
            document.getElementById("favHearth").classList.add("fa-regular");
        }
        // STATS actual
        document.getElementById("statAtkActual").innerHTML = formatNumber(monster.attack);
        document.getElementById("statDefActual").innerHTML = formatNumber(monster.defense);
        document.getElementById("statHpActual").innerHTML = formatNumber(monster.hp);
        document.getElementById("statSpeedActual").innerHTML = formatNumber(monster.speed);

    }
    else {
        document.getElementById("statAtkActual").innerHTML = "???";
        document.getElementById("statDefActual").innerHTML = "???";
        document.getElementById("statHpActual").innerHTML = "???";
        document.getElementById("statSpeedActual").innerHTML = "???";
    }
}

function hideMonsterInfo() {
    const playerMenuItems = getAllMenuItems();
    const divMonstreInfo = document.getElementById("divMonstreInfo");

    Array.from(playerMenuItems).forEach(item => {
        if (item.classList.contains("selected")) {

            const id = item.getAttribute("id").replace("menu", "div");
            document.getElementById(id).style.display = "block";
            divMonstreInfo.style.display = "none";
        }
    });
    resetDetailDivs();
}

function resetMonsterInfo() {
    document.getElementById("numero").innerHTML = "";
    document.getElementById("image").src = "";
    document.getElementById("variant").src = "";
    document.getElementById("name").innerHTML = "";
    document.getElementById("description").innerHTML = "";
    document.getElementById("rarity").innerHTML = "";
    document.getElementById("type").innerHTML = "";
    document.getElementById("lvl").innerHTML = "";
    document.getElementById("statAtkBase").innerHTML = "";
    document.getElementById("statDefBase").innerHTML = "";
    document.getElementById("statHpBase").innerHTML = "";
    document.getElementById("statSpeedBase").innerHTML = "";
    document.getElementById("level").innerHTML = "";
    document.getElementById("statAtkActual").innerHTML = "";
    document.getElementById("statDefActual").innerHTML = "";
    document.getElementById("statHpActual").innerHTML = "";
    document.getElementById("statSpeedActual").innerHTML = "";
    document.getElementById("favBtn").classList.add('hidden');
    document.getElementById("favHearth").classList.remove("fa-solid", "text-red-500");
    document.getElementById("favHearth").classList.add("fa-regular");
}



// Filter for the monster cards
function filter(divId, button, type) {

    const resetBtn = divId === "mp_myMonster" ? "btnResetFilter" : "btnResetFilter2";
    let value;
    if (button) {
        value = button.value;
        const selected = type === 'type' ? selectedColors : selectedNumbers; //TODO: change the letiable name

        const index = selected.indexOf(value);
        if (index > -1) {
            selected.splice(index, 1);
            button.classList.remove('selected');
            button.classList.remove('bg-gray-200');
            document.getElementById(resetBtn).classList.add('hidden');
        } else {
            if (type === 'rarity') { //TODO: change the letiable name
                document.querySelectorAll('button#rarityBtn').forEach(button => { //TODO: change the id in selector
                    button.classList.remove('selected');
                    button.classList.remove('bg-gray-200');
                });
                document.getElementById(resetBtn).classList.add('hidden');
                selected.length = 0;
            } else if (selected.length >= 2) {
                return;
            }
            selected.push(value);
            button.classList.add('selected');
            button.classList.add('bg-gray-200');
            document.getElementById(resetBtn).classList.remove('hidden');
        }
    }
    const inputId = divId === "mp_myMonster" ? "surnameInput" : "nameInput";
    const inputValue = document.getElementById(inputId).value.toLowerCase(); //TODO: change the id

    const divs = document.querySelectorAll(`#${divId} div[id^="cardMonster"]:not([id*="Details"])`); //TODO: change the id in selector
    const detailDivs = document.querySelectorAll(`#${divId} div[id$="Details"]`);

    detailDivs.forEach(div => {
        div.classList.add('hidden');
    });
    divs.forEach(div => {
        const nameValue = div.querySelector('h3#monsterName').textContent.toLowerCase(); //TODO: change the id in selector
        const hasSelectedColor = selectedColors.every(color => div.classList.contains("type--" + color)); //TODO: change the class name
        const hasSelectedNumber = selectedNumbers.every(number => div.classList.contains("rarity--" + number)); //TODO: change the class name
        const hasMatchingName = nameValue.includes(inputValue);
        div.classList.toggle('hidden', !(hasSelectedColor && hasSelectedNumber && hasMatchingName));

    });


}

function sortByLevel() {
    const divs = document.querySelectorAll(`#mp_myMonster div[id^="cardMonster"]:not([id*="Details"])`);
    const detailDivs = document.querySelectorAll(`#mp_myMonster div[id$="Details"]`);

    // Convert NodeList to array
    let diletray = Array.from(divs);
    let diletrayDetails = Array.from(detailDivs);

    if (originalDivs.length === 0) {
        originalDivs = diletray.slice();
        originalDivsDetails = diletrayDetails.slice();
    }

    sortOrder *= -1;

    // Sort array based on level
    diletray.sort(function (a, b) {
        let lvlA = parseInt(a.querySelector('#hiddenLvl').textContent);
        let lvlB = parseInt(b.querySelector('#hiddenLvl').textContent);
        return sortOrder * (lvlA - lvlB);
    });
    diletrayDetails.sort(function (a, b) {
        let lvlA = parseInt(a.querySelector('#hiddenLvl2').textContent);
        let lvlB = parseInt(b.querySelector('#hiddenLvl2').textContent);
        return sortOrder * (lvlA - lvlB);
    }
    );

    // Append the sorted array to the parent
    diletray.forEach(div => {
        document.getElementById("mp_myMonster").appendChild(div);
        detailDivs.forEach(divdetail => {
            if (div.id + "Details" == divdetail.id) {
                document.getElementById("mp_myMonster").appendChild(divdetail);
            }
        });
        if (!div.classList.contains('hidden')) {
            div.classList.remove('hidden');
        }
    });

    if (sortOrder === 1) {
        document.getElementById("btnSortByLevel").innerHTML = "Trier par niveau <i class='fa-solid fa-arrow-up'></i>";
    }
    else {
        document.getElementById("btnSortByLevel").innerHTML = "Trier par niveau <i class='fa-solid fa-arrow-down'></i>";
    }
    document.getElementById("btnResetFilter").classList.remove('hidden');

}

function resetFilters() {
    selectedColors = [];
    selectedNumbers = [];

    document.getElementById('btnResetFilter').classList.add('hidden');
    document.getElementById('btnResetFilter2').classList.add('hidden');

    document.querySelectorAll('button').forEach(button => {
        button.classList.remove('selected');
        button.classList.remove('bg-gray-200');
    });
    resetDetailDivs();

    document.getElementById('nameInput').value = null; //TODO: change the id
    document.getElementById('surnameInput').value = null; //TODO: change the id

    if (originalDivs.length > 0) {
        document.getElementById("btnSortByLevel").innerHTML = "Trier par niveau";

        originalDivs.forEach(div => {
            document.getElementById('mp_myMonster').appendChild(div);
            div.classList.remove('hidden');

            originalDivsDetails.forEach(divdetail => {
                if (div.id + "Details" == divdetail.id) {
                    document.getElementById("mp_myMonster").appendChild(divdetail);
                }
            });
            div.classList.remove('hidden');
        });
        originalDivs = [];
        originalDivsDetails = [];
    }
}

// Show the car and details of the monster card.
function showCard(cardNumber, equipe) {
    if (equipe) {
        document.getElementById(`cardMonsterEquip${cardNumber}Details`).classList.remove('hidden');
        document.getElementById(`cardMonsterEquip${cardNumber}`).classList.add('hidden');
    }
    else {
        document.getElementById(`cardMonster${cardNumber}Details`).classList.remove('hidden');
        document.getElementById(`cardMonster${cardNumber}`).classList.add('hidden');
    }
}
function hideCard(cardNumber, equipe) {
    if (equipe) {
        document.getElementById(`cardMonsterEquip${cardNumber}Details`).classList.add('hidden');
        document.getElementById(`cardMonsterEquip${cardNumber}`).classList.remove('hidden');
    }
    else {
        document.getElementById(`cardMonster${cardNumber}Details`).classList.add('hidden');
        document.getElementById(`cardMonster${cardNumber}`).classList.remove('hidden');
    }
}

function markedDiscovered() {
    let captured = getCapture();

    const monsterList = getMonsterList();

    monsterList.forEach(monster => {
        const div = document.querySelector(`#divCardMonster div[id^="cardMonster${monster.monster_id}"]`);
        if (captured.find(capture => capture.monster_id == monster.monster_id)) {

            let childElement = div.querySelector('#checkmark');
            let i = document.createElement("i");

            i.className = "text-green-500 fa-regular fa-circle-check fa-xl";
            childElement.appendChild(i);
            childElement.classList.remove('hidden');

        }
        else {
            let button = div.querySelector('#infoBtn');
            button.classList.add('hidden');

            let image = div.querySelector('#monsterImage');
            image.style.backgroundImage = `url()`;

            let name = div.querySelector('#monsterName');
            name.textContent = "???";
        }
    });
}

function rename(span, id) {
    let input = document.createElement("input");
    input.type = "text";
    input.value = span.textContent;
    input.className = "text-base border border-gray-300 rounded w-1/2 text-center p-0 m-0";
    span.replaceWith(input);
    input.select();
    input.addEventListener("blur", function () {
        input.replaceWith(span);
    });

    input.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            addAlert("warning", "Renommage", "Voulez-vous vraiment renommer ce monstre?", "", "Oui", function () {
                span.textContent = input.value;
                input.replaceWith(span);

                return removeAlert();
            }, "Non", function () { return removeAlert(); });
        }
    });
}

function resetDetailDivs() {

    document.querySelectorAll(` div[id^="cardMonster"]:not([id*="Details"])`).forEach(div => { div.classList.remove('hidden'); }); //TODO: change the id in selector

    const detailDivs = document.querySelectorAll(`div[id$="Details"]`);
    detailDivs.forEach(div => {
        div.classList.add('hidden');
    });
}