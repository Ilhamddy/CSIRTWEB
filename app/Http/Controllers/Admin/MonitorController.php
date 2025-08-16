<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        // ============================
        // CPU
        // ============================
        if (stristr(PHP_OS, 'WIN')) {
            $cpu = shell_exec('wmic cpu get loadpercentage /value');
            preg_match('/LoadPercentage=(\d+)/', $cpu, $matches);
            $cpuUsage = isset($matches[1]) ? (int)$matches[1] : null;
        } else {
            $cpuLoad = @file_get_contents('/proc/loadavg');
            if ($cpuLoad) {
                $cpuLoad = explode(' ', $cpuLoad);
                // loadavg biasanya dibandingkan dengan jumlah core CPU
                $cpuUsage = round(($cpuLoad[0] / max(1, shell_exec('nproc'))) * 100, 2);
            } else {
                $cpuUsage = null;
            }
        }

        // ============================
        // Memory
        // ============================
        if (stristr(PHP_OS, 'WIN')) {
            $output = shell_exec('wmic OS get FreePhysicalMemory,TotalVisibleMemorySize /Value');
            preg_match('/FreePhysicalMemory=(\d+)/', $output, $freeMem);
            preg_match('/TotalVisibleMemorySize=(\d+)/', $output, $totalMem);

            $totalMemMB = round($totalMem[1] / 1024, 2);
            $freeMemMB  = round($freeMem[1] / 1024, 2);
            $usedMemMB  = $totalMemMB - $freeMemMB;
            $memPercent = round(($usedMemMB / $totalMemMB) * 100, 2);
        } else {
            $free = shell_exec('free -m');
            $free_arr = explode("\n", trim($free));
            $mem = array_values(array_filter(explode(" ", $free_arr[1])));

            $totalMemMB = (int)$mem[1];
            $usedMemMB  = (int)$mem[2];
            $freeMemMB  = $totalMemMB - $usedMemMB;
            $memPercent = round(($usedMemMB / $totalMemMB) * 100, 2);
        }

        // ============================
        // Disk
        // ============================
        $diskTotalGB = round(disk_total_space("/") / 1024 / 1024 / 1024, 2);
        $diskFreeGB  = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
        $diskUsedGB  = $diskTotalGB - $diskFreeGB;
        $diskPercent = round(($diskUsedGB / $diskTotalGB) * 100, 2);

        // ============================
        // Data untuk view
        // ============================
        $data = [
            'cpu' => $cpuUsage !== null ? $cpuUsage . " %" : "Not available",
            'memory' => [
                'used'   => $usedMemMB . " MB",
                'free'   => $freeMemMB . " MB",
                'total'  => $totalMemMB . " MB",
                'percent' => $memPercent . " %",
            ],
            'disk' => [
                'used'   => $diskUsedGB . " GB",
                'free'   => $diskFreeGB . " GB",
                'total'  => $diskTotalGB . " GB",
                'percent' => $diskPercent . " %",
            ]
        ];

        return view('pages.admin.monitor.index', compact('data'));
    }
}
