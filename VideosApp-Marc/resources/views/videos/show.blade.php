@extends('layouts.videos-app-layout')

@section('title', $video->title . ' - Videos App')

@section('content')
    <div class="video-page">
        <!-- Video Player Section -->
        <div class="video-player-section">
            <div class="video-container">
                <div class="video-wrapper">
                    <iframe
                        src="{{ $video->url }}"
                        allow="autoplay; fullscreen; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="glow-border"></div>
            </div>
        </div>

        <!-- Video Information Section -->
        <div class="video-info-section">
            <h1 class="video-title">{{ $video->title }}</h1>


            <div class="video-metadata">
                <div class="metadata-item">
                    <p> Creat: <span class="metadata-date">{{ $video->created_at->format('F d, Y') }}</span></p>
                    <p>  Actualitzat: <span class="metadata-date">{{ $video->updated_at->format('F d, Y')}}</span></p>
                </div>

                <div class="metadata-actions">
                    <a href="{{ $video->url }}" target="_blank" class="action-link">
                        <span class="action-icon">↗</span>
                        <span>Original Source</span>
                    </a>
                </div>
            </div>

            <div class="video-description-container">
                <div class="description-header">About this video</div>
                <div class="description-content">{{ $video->description }}</div>
            </div>
        </div>
    </div>

    <style>
        /* Base Styles */
        body {
            margin: 0;
            padding: 0;
            background-color: #080810;
            color: #e6e6fa;
            font-family: 'Inter', 'Helvetica Neue', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Layout Components */
        header, footer {
            padding: 1.2rem 2rem;
            background-color: rgba(10, 10, 20, 0.8);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
            z-index: 100;
        }

        header nav a, footer a {
            color: #e6e6fa;
            text-decoration: none;
            margin: 0 15px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            padding: 5px 0;
        }

        header nav a::after, footer a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: linear-gradient(90deg, #c471ed, #f64f59);
            transition: width 0.3s ease;
        }

        header nav a:hover, footer a:hover {
            color: #fff;
        }

        header nav a:hover::after, footer a:hover::after {
            width: 100%;
        }

        /* Video Page Layout */
        .video-page {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 1.5rem;
            gap: 3rem;
        }

        /* Video Player Section */
        .video-player-section {
            width: 100%;
            position: relative;
        }

        .video-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .glow-border {
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border-radius: 15px;
            background: linear-gradient(45deg, #c471ed, #f64f59, #12c2e9, #c471ed);
            background-size: 400% 400%;
            animation: borderGlow 15s ease infinite;
            filter: blur(5px);
            z-index: -1;
            opacity: 0.7;
        }

        .video-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 10px;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Video Information Section */
        .video-info-section {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            padding: 0 1rem;
        }

        .video-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(90deg, #fff, #c9c9c9);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        .video-metadata {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .metadata-item {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .metadata-date {
            color: #a0a0c0;
            font-size: 0.95rem;
        }

        .metadata-actions {
            display: flex;
            gap: 1.5rem;
        }

        .action-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #c471ed;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .action-link:hover {
            color: #f64f59;
        }

        .action-icon {
            font-size: 1.1rem;
        }

        /* Video Description */
        .video-description-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            background-color: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .description-header {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            position: relative;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .description-header::after {
            content: '';
            position: absolute;
            width: 2rem;
            height: 3px;
            bottom: -0.5rem;
            left: 0;
            background: linear-gradient(90deg, #c471ed, #f64f59);
            border-radius: 3px;
        }

        .description-content {
            color: #d0d0e0;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        /* Animations */
        @keyframes borderGlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Logo */
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            background: linear-gradient(90deg, #c471ed, #f64f59);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .video-page {
                padding: 2rem 1rem;
                gap: 2rem;
            }

            .video-title {
                font-size: 1.8rem;
            }

            .video-metadata {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .metadata-actions {
                width: 100%;
                justify-content: flex-start;
                margin-top: 0.5rem;
            }

            .video-description-container {
                padding: 1.5rem;
            }
        }
    </style>
@endsection

