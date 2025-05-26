document.addEventListener('DOMContentLoaded', () => {
    console.log('script.js chargé');

    const form = document.getElementById('session-form');
    const tableContainer = document.getElementById('absence-table-container');
    let sessionData = {};
    let students = [];

    // Au départ, on masque la table
    tableContainer.style.display = 'none';

    // Génère la table après soumission du formulaire
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        sessionData = {
            module: form.module.value,
            date: form.date.value,
            heure: form.time.value  // on récupère la valeur du select "time"
        };

        // Récupération des étudiants via fetch
        try {
            const res = await fetch('get_students.php');
            if (!res.ok) throw new Error('Erreur de récupération des étudiants');
            students = await res.json();
        } catch (error) {
            alert('Erreur lors du chargement des étudiants : ' + error.message);
            return;
        }

        generateTable();
        tableContainer.style.display = 'block'; // Affiche la table après génération
    });

    // Génère la table HTML des étudiants
    function generateTable() {
        let table = `<table><thead><tr><th>Nom</th><th>Prénom</th><th>Absence</th></tr></thead><tbody>`;

        students.forEach(student => {
            table += `
                <tr data-id="${student.id}">
                    <td>${student.nom}</td>
                    <td>${student.prenom}</td>
                    <td>
                        <div class="absence-cell" data-status="present">Présent</div>
                    </td>
                </tr>`;
        });

        table += `</tbody></table>
                  <button class="button button-primary" id="save-button" style="margin-top: 1rem;">Enregistrer les absences</button>`;
        tableContainer.innerHTML = table;

        setupAbsenceEvents();
    }

    // Gère les clics sur les cellules d'absence
    function setupAbsenceEvents() {
        const cells = document.querySelectorAll('.absence-cell');
        cells.forEach(cell => {
            cell.addEventListener('click', () => {
                let current = cell.dataset.status;

                if (current === 'present') {
                    cell.dataset.status = 'abi';
                    cell.className = 'absence-cell absent-abi';
                    cell.textContent = 'ABI';
                } else if (current === 'abi') {
                    cell.dataset.status = 'abj';
                    cell.className = 'absence-cell absent-abj';
                    cell.textContent = 'ABJ';
                } else if (current === 'abj') {
                    cell.dataset.status = 'present';
                    cell.className = 'absence-cell';
                    cell.textContent = 'Présent';
                }
            });

            cell.addEventListener('dblclick', () => {
                cell.dataset.status = 'cancelled';
                cell.className = 'absence-cell cancelled';
                cell.textContent = 'Annulée';
            });
        });

        document.getElementById('save-button').addEventListener('click', saveAbsences);
    }

    // Sauvegarde les absences
    async function saveAbsences() {
        const absences = [];

        document.querySelectorAll('tr[data-id]').forEach(row => {
            const id = row.dataset.id;
            const status = row.querySelector('.absence-cell').dataset.status;
            absences.push({ id, status });
        });

        const payload = {
            session: sessionData,
            absences
        };

        try {
            const res = await fetch('save_absences.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });

            const result = await res.json();
            alert(result.message);
        } catch (error) {
            alert('Erreur lors de l\'enregistrement : ' + error.message);
        }
    }
});
