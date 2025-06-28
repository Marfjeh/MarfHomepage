function goUrl(url) {
    window.location.href = url.trim();
}

function renderButtons(lijst) {
    const container = document.getElementById("button-container");
    container.innerHTML = '';
    lijst.forEach(([name, url, color]) => {
        const button = document.createElement("button");
        button.className = "linkbutton";
        button.style.backgroundColor = `#${color}`;
        button.onclick = () => goUrl(url);
        const div = document.createElement("div");
        div.className = "image-container";
        div.style.backgroundImage = `url(img/${name}.png)`;
        button.appendChild(div);
        container.appendChild(button);
    });
}

function saveJson() {
    const input = document.getElementById("json-input").value;
    const errorMsg = document.getElementById("error-msg");
    try {
        const parsed = JSON.parse(input);
        localStorage.setItem("customLijst", JSON.stringify(parsed));
        renderButtons(parsed);
        errorMsg.textContent = "Saved and updated successfully!";
        errorMsg.style.color = "green";
    } catch (e) {
        errorMsg.textContent = "Invalid JSON: " + e.message;
        errorMsg.style.color = "red";
    }
}

function exportJson() {
    const json = localStorage.getItem("customLijst");
    const blob = new Blob([json], {
        type: "application/json"
    });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "button-list.json";
    a.click();
    URL.revokeObjectURL(url);
}

function importJson(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
        try {
            const data = JSON.parse(e.target.result);
            localStorage.setItem("customLijst", JSON.stringify(data));
            document.getElementById("json-input").value = JSON.stringify(data, null, 2);
            renderButtons(data);
        } catch (err) {
            alert("Failed to import JSON: " + err.message);
        }
    };
    reader.readAsText(file);
}

window.onload = function () {
    const defaultLijst = [
        ["youtube", "http://www.youtube.com", "e52d27"],
        ["github", "http://www.github.com", "ffffff"],
        ["whatsapp", "http://web.whatsapp.com", "00A85A"]
    ];
    const stored = localStorage.getItem("customLijst");
    const lijst = stored ? JSON.parse(stored) : defaultLijst;
    renderButtons(lijst);
    document.getElementById("json-input").value = JSON.stringify(lijst, null, 2);
};