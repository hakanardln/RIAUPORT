@extends('layouts.sopir')

@section('title', 'Dashboard')

@section('content')
<style>
    .dashboard-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #eff6ff 0%, #ecfeff 50%, #e0f2fe 100%);
        padding: 2rem;
    }
    
    .dashboard-header {
        font-size: 2.25rem;
        font-weight: 700;
        color: #0d9488;
        margin-bottom: 1.5rem;
    }
    
    .welcome-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        gap: 1.5rem;
        align-items: flex-start;
    }
    
    .car-image {
        width: 144px;
        height: 96px;
        background: #e2e8f0;
        border-radius: 0.75rem;
        overflow: hidden;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    .car-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .welcome-info {
        flex: 1;
    }
    
    .welcome-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #0d9488;
        margin-bottom: 1rem;
    }
    
    .info-row {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .info-item {
        display: flex;
        gap: 0.5rem;
    }
    
    .info-label {
        color: #0d9488;
        font-weight: 500;
    }
    
    .info-value {
        color: #374151;
    }
    
    .routes-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
        margin-bottom: 1rem;
    }
    
    .route-card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 0.75rem;
        backdrop-filter: blur(10px);
    }
    
    .route-card-1 {
        background: rgba(165, 243, 252, 0.9);
    }
    
    .route-card-2 {
        background: rgba(241, 245, 249, 0.9);
    }
    
    .route-header {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #1f2937;
    }
    
    .route-icon {
        width: 16px;
        height: 16px;
    }
    
    .route-time {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        margin-bottom: 0.5rem;
    }
    
    .route-path {
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }
    
    .time-icon, .location-icon {
        width: 14px;
        height: 14px;
        color: #0f766e;
    }
    
    .time-text, .location-text {
        font-size: 0.875rem;
        font-weight: 500;
        color: #1f2937;
    }
    
    .path-line {
        flex: 1;
        height: 1.5px;
        background: #0f766e;
        position: relative;
    }
    
    .path-dot {
        width: 8px;
        height: 8px;
        background: #0f766e;
        border-radius: 50%;
        position: absolute;
        top: -3px;
    }
    
    .path-dot-start {
        left: 0;
    }
    
    .path-dot-end {
        right: 0;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
    }
    
    .stat-card {
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        padding: 0.75rem;
        text-align: center;
        backdrop-filter: blur(10px);
    }
    
    .stat-card-customers {
        background: rgba(190, 242, 100, 0.9);
    }
    
    .stat-card-reviews {
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    
    .stat-card-map {
        background: rgba(255, 255, 255, 0.7);
        padding: 0;
        overflow: hidden;
    }
    
    .stat-title {
        font-size: 0.75rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }
    
    .stat-number {
        font-size: 2.25rem;
        font-weight: 700;
        color: #115e59;
    }
    
    .qr-icon {
        width: 28px;
        height: 28px;
        color: #0f766e;
        margin-bottom: 0.25rem;
    }
    
    .map-container {
        width: 100%;
        height: 150px;
        position: relative;
        background: linear-gradient(135deg, #d1fae5 0%, #dbeafe 100%);
    }
    
    .map-label-top {
        position: absolute;
        top: 0.5rem;
        right: 0.75rem;
        text-align: right;
        font-size: 0.625rem;
        color: #4b5563;
    }
    
    .map-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 1rem;
        font-weight: 700;
        color: #1f2937;
    }
    
    .map-marker {
        position: absolute;
        bottom: 0.75rem;
        right: 1rem;
        display: flex;
        align-items: center;
        gap: 0.2rem;
    }
    
    .marker-dot {
        width: 18px;
        height: 18px;
        background: #ef4444;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4);
    }
    
    .marker-inner {
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
    }
    
    .marker-label {
        font-size: 0.625rem;
        font-weight: 600;
        color: #dc2626;
    }
</style>

    <!-- Welcome Card -->
    <div class="welcome-card">
        <div class="car-image">
            <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=400&h=300&fit=crop" alt="Toyota Kijang Innova">
        </div>
        <div class="welcome-info">
            <h2 class="welcome-title">Halo! Selamat Datang Fitra</h2>
            <div class="info-row">
                <div class="info-item">
                    <span class="info-label">Armada :</span>
                    <span class="info-value">Toyota Kijang Innova</span>
                </div>
                <div class="info-item">
                    <span class="info-label">TNKB :</span>
                    <span class="info-value">BM801452</span>
                </div>
            </div>
            <div class="info-item">
                <span class="info-label">Warna :</span>
                <span class="info-value">Hitam Metalik</span>
            </div>
        </div>
    </div>
    
    <!-- Routes -->
    <div class="routes-grid">
        <!-- Route 1 -->
        <div class="route-card route-card-1">
            <div class="route-header">
                <svg class="route-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
                <span>Rute 1:</span>
            </div>
            <div class="route-time">
                <svg class="time-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="time-text">08:00</span>
            </div>
            <div class="route-path">
                <svg class="location-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="location-text">Bengkalis</span>
                <div class="path-line">
                    <div class="path-dot path-dot-start"></div>
                    <div class="path-dot path-dot-end"></div>
                </div>
                <span class="location-text">Dumai</span>
            </div>
        </div>
        
        <!-- Route 2 -->
        <div class="route-card route-card-2">
            <div class="route-header">
                <svg class="route-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                </svg>
                <span>Rute 2:</span>
            </div>
            <div class="route-time">
                <svg class="time-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="time-text">13:30</span>
            </div>
            <div class="route-path">
                <svg class="location-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="location-text">Dumai</span>
                <div class="path-line">
                    <div class="path-dot path-dot-start"></div>
                    <div class="path-dot path-dot-end"></div>
                </div>
                <span class="location-text">Duri</span>
            </div>
        </div>
    </div>
    
    <!-- Stats -->
    <div class="stats-grid">
        <!-- Jumlah Pelanggan -->
        <div class="stat-card stat-card-customers">
            <div class="stat-title">Jumlah<br>Pelanggan</div>
            <div class="stat-number">15</div>
        </div>
        
        <!-- Ulasan Masuk -->
        <div class="stat-card stat-card-reviews">
            <svg class="qr-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
            </svg>
            <div class="stat-title">Ulasan Masuk</div>
            <div class="stat-number">8</div>
        </div>
        
        <!-- Map -->
        <div class="stat-card stat-card-map">
            <div class="map-container">
                <div class="map-label-top">
                    <div>Kantor Kementerian</div>
                    <div>Agama Kabupaten...</div>
                </div>
                <div class="map-center">Bengkalis</div>
                <div class="map-marker">
                    <div class="marker-dot">
                        <div class="marker-inner"></div>
                    </div>
                    <div class="marker-label">RSUD Bengkalis</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection