<?php include '../views/common/header.php'; ?>

<div class="page-admin-supplies">
    <h2>Supply Request Logistics</h2>

    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
    <?php endif; ?>
    <?php if(isset($_GET['error'])): ?>
        <div class="alert alert-error"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Astronaut</th>
                    <th>Mission</th>
                    <th>Item Requested</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($supplyRequests as $request): ?>
                    <tr>
                        <td><?php echo $request['request_date']; ?></td>
                        <td><?php echo htmlspecialchars($request['astronaut_name']); ?></td>
                        <td><?php echo htmlspecialchars($request['mission_title']); ?></td>
                        <td><?php echo htmlspecialchars($request['item_name']); ?></td>
                        <td><?php echo $request['quantity']; ?></td>
                        <td>
                            <?php if ($request['status'] === 'pending'): ?>
                                <div style="display: flex; gap: 5px;">
                                    <form action="index.php?action=update_supply_status" method="POST">
                                        <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="btn" style="padding: 5px 10px; font-size: 0.8rem; background: var(--primary-color);">ACCEPT</button>
                                    </form>
                                    <form action="index.php?action=update_supply_status" method="POST">
                                        <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 0.8rem;">DENY</button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <span class="badge status-<?php echo strtolower($request['status']); ?>">
                                    <?php echo strtoupper($request['status']); ?>
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if(empty($supplyRequests)): ?>
                    <tr><td colspan="6">No supply requests found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../views/common/footer.php'; ?>
