<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zestaw Funkcji JavaScript</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; background-color: #f9f9f9; }
        .sekcja { background: white; padding: 15px; margin-bottom: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h3 { margin-top: 0; color: #333; border-bottom: 2px solid #eee; padding-bottom: 5px; }
        input, select, button { padding: 8px; margin: 5px 5px 5px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #007BFF; color: white; cursor: pointer; border: none; }
        button:hover { background-color: #0056b3; }
        .output { font-weight: bold; margin-top: 10px; color: #007BFF; }
        #wynik { border: 2px dashed #28a745; padding: 10px; background: #e8f5e9; color: #1b5e20; margin-top: 10px; border-radius: 4px; font-weight: bold; }
    </style>
</head>
<body>

    <!-- 1. SUMA -->
    <div class="sekcja">
        <h3>1. SUMA (Liczby całkowite)</h3>
        <input type="number" id="suma_l1" placeholder="Liczba 1">
        <input type="number" id="suma_l2" placeholder="Liczba 2">
        <button onclick="uruchomSuma()">Oblicz</button>
        <div id="suma_out" class="output"></div>
    </div>

    <!-- 2. PODSTAWY -->
    <div class="sekcja">
        <h3>2. PODSTAWY (Różnica, iloczyn, iloraz)</h3>
        <input type="number" id="podst_l1" placeholder="Liczba 1">
        <input type="number" id="podst_l2" placeholder="Liczba 2">
        <button onclick="uruchomPodstawy()">Oblicz</button>
        <div id="podst_out" class="output"></div>
    </div>

    <!-- 3. KALKULATOR -->
    <div class="sekcja">
        <h3>3. KALKULATOR (Wynik w kontenerze #wynik)</h3>
        <input type="number" id="kal_l1" placeholder="Liczba 1">
        <input type="number" id="kal_l2" placeholder="Liczba 2">
        <select id="kal_dzialanie">
            <option value="suma">Suma</option>
            <option value="różnica">Różnica</option>
            <option value="iloczyn">Iloczyn</option>
            <option value="iloraz">Iloraz</option>
        </select>
        <button onclick="uruchomKalkulator()">Oblicz działanie</button>
    </div>

    <!-- WSPÓLNY KONTENER DLA ZADAŃ WYMAGAJĄCYCH ID "WYNIK" (Kalkulator i BMI) -->
    <div class="sekcja">
        <h3>Dedykowany kontener: id="wynik"</h3>
        <div id="wynik">Tutaj pojawi się wynik działania Kalkulatora lub BMI.</div>
    </div>

    <!-- 4. MAKS -->
    <div class="sekcja">
        <h3>4. MAKS (Największa z 3 liczb)</h3>
        <input type="number" id="max_l1" placeholder="Liczba 1">
        <input type="number" id="max_l2" placeholder="Liczba 2">
        <input type="number" id="max_l3" placeholder="Liczba 3">
        <button onclick="uruchomMaks()">Znajdź Maks</button>
        <div id="max_out" class="output"></div>
    </div>

    <!-- 5. WZROST -->
    <div class="sekcja">
        <h3>5. WZROST (Klasyfikacja)</h3>
        <input type="number" id="wzrost_val" placeholder="Wzrost w cm">
        <button onclick="uruchomWzrost()">Klasyfikuj</button>
        <div id="wzrost_out" class="output"></div>
    </div>

    <!-- 6. BMI -->
    <div class="sekcja">
        <h3>6. BMI (Wynik w kontenerze #wynik)</h3>
        <input type="number" id="bmi_wzrost" placeholder="Wzrost (cm)">
        <input type="number" id="bmi_waga" placeholder="Waga (kg)">
        <button onclick="uruchomBmi()">Oblicz BMI</button>
    </div>

    <!-- 7. STARSZY -->
    <div class="sekcja">
        <h3>7. STARSZY (Porównanie dat urodzenia)</h3>
        Osoba 1: <input type="date" id="data1"><br>
        Osoba 2: <input type="date" id="data2"><br>
        <button onclick="uruchomStarszy()">Kto starszy?</button>
        <div id="starszy_out" class="output"></div>
    </div>

    <!-- 8. PRZESTĘPNY -->
    <div class="sekcja">
        <h3>8. PRZESTĘPNY (Sprawdzenie roku)</h3>
        <input type="number" id="rok_val" placeholder="Wpisz rok" value="2026">
        <button onclick="uruchomPrzestepny()">Sprawdź rok</button>
        <div id="rok_out" class="output"></div>
    </div>

    <!-- 9. SIŁA -->
    <div class="sekcja">
        <h3>9. SIŁA (Walidacja hasła)</h3>
        <input type="text" id="haslo_val" placeholder="Wpisz hasło">
        <button onclick="uruchomSila()">Sprawdź siłę</button>
        <div id="haslo_out" class="output"></div>
    </div>

    <!-- 10. TROJKAT -->
    <div class="sekcja">
        <h3>10. TROJKAT (Warunek istnienia trójkąta)</h3>
        <input type="number" id="troj_a" placeholder="Bok A">
        <input type="number" id="troj_b" placeholder="Bok B">
        <input type="number" id="troj_c" placeholder="Bok C">
        <button onclick="uruchomTrojkat()">Czy powstanie trójkąt?</button>
        <div id="troj_out" class="output"></div>
    </div>

    <!-- 11. SZYFR -->
    <div class="sekcja">
        <h3>11. SZYFR (Szyfrowanie w czasie rzeczywistym)</h3>
        <input type="text" id="szyfr_input" onkeyup="uruchomSzyfr()" placeholder="Wpisz tekst do zaszyfrowania...">
        <span style="margin-left: 20px; font-weight: bold;">Wynik po prawej: </span>
        <span id="szyfr-wynik" style="color: red; font-family: monospace; font-size: 1.2em;"></span>
    </div>

    <!-- SKRYPTY JAVASCRIPT -->
    <script>
        // 1. SUMA
        function SUMA(liczba1, liczba2) {
            let l1 = parseInt(liczba1);
            let l2 = parseInt(liczba2);
            let wynik = l1 + l2;
            document.getElementById("suma_out").innerText = "Suma wynosi: " + wynik;
        }
        function uruchomSuma() {
            SUMA(document.getElementById("suma_l1").value, document.getElementById("suma_l2").value);
        }

        // 2. PODSTAWY
        function PODSTAWY(liczba1, liczba2) {
            let l1 = parseFloat(liczba1);
            let l2 = parseFloat(liczba2);
            let roznica = l1 - l2;
            let iloczyn = l1 * l2;
            let iloraz = l2 !== 0 ? (l1 / l2).toFixed(2) : "Nie można dzielić przez 0";
            document.getElementById("podst_out").innerText = `Różnica: ${roznica} | Iloczyn: ${iloczyn} | Iloraz: ${iloraz}`;
        }
        function uruchomPodstawy() {
            PODSTAWY(document.getElementById("podst_l1").value, document.getElementById("podst_l2").value);
        }

        // 3. KALKULATOR
        function KALKULATOR(liczba1, liczba2, dzialanie) {
            let l1 = parseFloat(liczba1);
            let l2 = parseFloat(liczba2);
            let wynik;
            switch(dzialanie) {
                case "suma":     wynik = l1 + l2; break;
                case "różnica":  wynik = l1 - l2; break;
                case "iloczyn":  wynik = l1 * l2; break;
                case "iloraz":   wynik = l2 !== 0 ? l1 / l2 : "Błąd (dzielenie przez 0)"; break;
                default:         wynik = "Nieznane działanie";
            }
            document.getElementById("wynik").innerText = "Wynik kalkulatora: " + wynik;
        }
        function运行Kalkulator() {} // Pomocnicza do wywołania
        function uruchomKalkulator() {
            KALKULATOR(document.getElementById("kal_l1").value, document.getElementById("kal_l2").value, document.getElementById("kal_dzialanie").value);
        }

        // 4. MAKS
        function MAKS(l1, l2, l3) {
            let max = Math.max(parseFloat(l1), parseFloat(l2), parseFloat(l3));
            document.getElementById("max_out").innerText = "Największa liczba to: " + (isNaN(max) ? "Wpisz poprawne liczby" : max);
        }
        function uruchomMaks() {
            MAKS(document.getElementById("max_l1").value, document.getElementById("max_l2").value, document.getElementById("max_l3").value);
        }

        // 5. WZROST
        function WZROST(wzrostWcm) {
            let w = parseFloat(wzrostWcm);
            let komunikat = "";
            if (w < 150) {
                komunikat = "niski";
            } else if (w > 180) {
                komunikat = "wysoki";
            } else {
                komunikat = "średni";
            }
            document.getElementById("wzrost_out").innerText = "Klasyfikacja wzrostu: " + komunikat;
        }
        function uruchomWzrost() {
            WZROST(document.getElementById("wzrost_val").value);
        }

        // 6. BMI
        function BMI(wzrostCm, wagaKg) {
            let wzrostM = parseFloat(wzrostCm) / 100;
            let waga = parseFloat(wagaKg);
            let bmi = waga / (wzrostM * wzrostM);
            let komentarz = "";
            if (bmi < 18.5) {
                komentarz = "za mało!";
            } else if (bmi > 25) {
                komentarz = "za dużo!";
            } else {
                komentarz = "OK!";
            }
            document.getElementById("wynik").innerText = `Wskaźnik BMI: ${bmi.toFixed(2)} — ${komentarz}`;
        }
        function uruchomBmi() {
            BMI(document.getElementById("bmi_wzrost").value, document.getElementById("bmi_waga").value);
        }

        // 7. STARSZY
        function STARSZY(data1String, data2String) {
            if(!data1String || !data2String) {
                document.getElementById("starszy_out").innerText = "Wybierz obie daty!";
                return;
            }
            let data1 = new Date(data1String);
            let data2 = new Date(data2String);
            if (data1 < data2) {
                document.getElementById("starszy_out").innerText = "Pierwsza osoba jest starsza (urodziła się wcześniej).";
            } else if (data2 < data1) {
                document.getElementById("starszy_out").innerText = "Druga osoba jest starsza (urodziła się wcześniej).";
            } else {
                document.getElementById("starszy_out").innerText = "Obie osoby są w tym samym wieku.";
            }
        }
        function uruchomStarszy() {
            STARSZY(document.getElementById("data1").value, document.getElementById("data2").value);
