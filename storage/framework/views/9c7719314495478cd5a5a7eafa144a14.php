<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Report - <?php echo e($report['period']['formatted'] ?? ''); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .summary {
            margin-bottom: 20px;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        .summary-total {
            font-weight: bold;
            border-top: 2px solid #333;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .positive {
            color: green;
        }
        .negative {
            color: red;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Monthly Financial Report</h1>
        <p>Month: <?php echo e($report['period']['formatted'] ?? ''); ?></p>
    </div>

    <div class="summary">
        <h3>Monthly Summary</h3>
        <div class="summary-item">
            <span>Revenue:</span>
            <span>$<?php echo e(number_format($report['revenue']['total_revenue'] ?? 0, 2)); ?></span>
        </div>
        <div class="summary-item">
            <span>Expenses:</span>
            <span>$<?php echo e(number_format($report['expenses']['total_expenses'] ?? 0, 2)); ?></span>
        </div>
        <div class="summary-item summary-total">
            <span>Net Profit/Loss:</span>
            <span class="<?php echo e(($report['profit_loss']['profit'] ?? 0) >= 0 ? 'positive' : 'negative'); ?>">
                $<?php echo e(number_format($report['profit_loss']['profit'] ?? 0, 2)); ?>

            </span>
        </div>
        <div class="summary-item">
            <span>Profit Margin:</span>
            <span><?php echo e(number_format($report['profit_loss']['profit_margin'] ?? 0, 2)); ?>%</span>
        </div>
    </div>

    <div>
        <h3>Revenue Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Metric</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Revenue</td>
                    <td>$<?php echo e(number_format($report['revenue']['total_revenue'] ?? 0, 2)); ?></td>
                </tr>
                <tr>
                    <td>Total Transactions</td>
                    <td><?php echo e($report['revenue']['total_transactions'] ?? 0); ?></td>
                </tr>
                <tr>
                    <td>Average Transaction</td>
                    <td>$<?php echo e(number_format($report['revenue']['total_transactions'] > 0 ? ($report['revenue']['total_revenue'] / $report['revenue']['total_transactions']) : 0, 2)); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <h3>Expense Details</h3>
        <table>
            <thead>
                <tr>
                    <th>Metric</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Expenses</td>
                    <td>$<?php echo e(number_format($report['expenses']['total_expenses'] ?? 0, 2)); ?></td>
                </tr>
                <tr>
                    <td>Total Expenses Count</td>
                    <td><?php echo e($report['expenses']['total_expenses_count'] ?? 0); ?></td>
                </tr>
                <tr>
                    <td>Average Expense</td>
                    <td>$<?php echo e(number_format($report['expenses']['total_expenses_count'] > 0 ? ($report['expenses']['total_expenses'] / $report['expenses']['total_expenses_count']) : 0, 2)); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 30px; text-align: center; font-size: 12px; color: #666;">
        <p>Generated on <?php echo e(date('Y-m-d H:i:s')); ?></p>
    </div>
</body>
</html><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\finance\exports\monthly-pdf.blade.php ENDPATH**/ ?>