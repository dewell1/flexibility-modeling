<?php
require_once 'php/controller/stats-controller.php';

$pageTitle = "User Statistics";
include $abs_path . '/php/include/head.php';
$_SESSION['currentpage'] = 'stats';
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        .styled-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border: 1px solid #dddddd;
        }

        .styled-table th {
            background-color: #f4f4f4;
            text-align: center;
        }

        .styled-table td {
            background-color: #f9f9f9;
        }

        .styled-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .legend-mandatory {
            background-color: #e0ffe0;
            /* Light green for mandatory */
        }

        .legend-desired {
            background-color: #ffffe0;
            /* Light yellow for desired */
        }

        .legend-irrelevant {
            background-color: #ffe0e0;
            /* Light red for irrelevant */
        }

        .styled-table td input[type="checkbox"] {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] == true) {
            include 'php/include/header_loggedin.php';
        } else {
            include 'php/include/header_loggedout.php';
        }
    } else {
        $_SESSION['loggedin'] = false;
        include 'php/include/header_loggedout.php';
    } ?>
    <!-- Notification system -->
    <?php include 'php/include/notifications.php'; ?>

    <main>
        <article class="flexmodelstats-article">
        <h4>Statistics about users' parameter choice</h4>

            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th><input class="form-check-input" type="checkbox" id="flexibilityCheck">
                            <label class="form-check-label checked" id="flexibilityCheckboxLabel"
                                for="flexibilityCheck">
                                mandatory</label>
                        </th>
                        <th> <input class="form-check-input" type="checkbox" id="flexibilityCheck">
                        <label class="form-check-label" id="flexibilityCheckboxLabel" for="flexibilityCheck"> desired</label></th>
                        <th>          <input class="form-check-input" type="checkbox" id="flexibilityCheck">
          <label class="form-check-label exclamation" id="flexibilityCheckboxLabel" for="flexibilityCheck">
            irrelevant</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Flexibility</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Mediator</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Asset Types</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Aggregation</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Metric</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Resolution</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Constraints</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Classification</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Uncertainty</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Sector Coupling</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                    <tr>
                        <td>Multi-time-scale</td>
                        <td class="legend-mandatory"></td>
                        <td class="legend-desired"></td>
                        <td class="legend-irrelevant"></td>
                    </tr>
                </tbody>
            </table>
        </article>
    </main>

</body>
<?php include $abs_path . '/php/include/footer.php'; ?>

</html>