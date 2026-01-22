document.addEventListener('DOMContentLoaded', function () {
    const logForms = document.querySelectorAll('form[action="index.php?action=submit_log"]');
    logForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            if (!confirm('Are you sure you want to transmit this mission log? This will be recorded in mission history.')) {
                e.preventDefault();
            }
        });
    });

    const supplyForm = document.getElementById('supply-request-form');
    const tableBody = document.getElementById('supply-history-body');

    if (supplyForm && tableBody) {
        supplyForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const item = this.querySelector('input[name="item_name"]').value;
            const qty = this.querySelector('input[name="quantity"]').value;

            if (!confirm(`Confirm requisition for ${qty}x ${item}?`)) {
                return;
            }

            const formData = new FormData(this);

            fetch('index.php?action=request_supply', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const row = `
                        <tr>
                            <td>${data.data.request_date}</td>
                            <td>${data.data.item_name}</td>
                            <td>${data.data.quantity}</td>
                            <td>
                                <span class="badge" style="color: var(--primary-color)">
                                    ${data.data.status}
                                </span>
                            </td>
                        </tr>
                    `;
                        tableBody.insertAdjacentHTML('afterbegin', row);
                        supplyForm.reset();
                        alert('Requisition Successful');
                    } else {
                        alert('Error: ' + (data.error || 'Request failed'));
                    }
                })
                .catch(err => {
                    console.error('AJAX Error:', err);
                    alert('Communication error with Mission Control');
                });
        });
    }
});
