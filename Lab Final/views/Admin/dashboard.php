<h1>Dashboard</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Employer Name</th>
        <th>Company Name</th>
        <th>Contact No</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($employers as $employer): ?>
        <tr>
            <td><?= $employer['id'] ?></td>
            <td><?= $employer['employer_name'] ?></td>
            <td><?= $employer['company_name'] ?></td>
            <td><?= $employer['contact_no'] ?></td>
            <td>
                <a href="/index.php?controller=admin&action=delete&id=<?= $employer['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>