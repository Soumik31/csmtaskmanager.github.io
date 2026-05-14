/**
 * Supabase Configuration and Auth Utilities
 * 
 * Initializes the Supabase client and provides authentication helper functions.
 * This file assumes the Supabase SDK is loaded via a <script> tag from CDN:
 * https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2
 * 
 * The SDK exposes window.supabase which is used here to create the client.
 */

// Supabase project configuration
const SUPABASE_URL = 'https://mvqzkhdosclvtmislkts.supabase.co';
const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im12cXpraGRvc2NsdnRtaXNsa3RzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Nzg3NDYxMjksImV4cCI6MjA5NDMyMjEyOX0.lZaKmjiiZomAkbmgtr5bptZngQqftJ_RS4IBQS3_wKQ';

// Initialize Supabase client
// The CDN UMD bundle exposes window.supabase with createClient
var supabase;
if (window.supabase && window.supabase.createClient) {
    supabase = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
} else {
    console.error('Supabase SDK not loaded. Make sure the CDN script tag is included before this file.');
}

/**
 * Get the currently logged-in username from session storage.
 * @returns {string|null} The username if authenticated, null otherwise.
 */
function getCurrentUser() {
    return sessionStorage.getItem('csm_user');
}

/**
 * Auth guard — redirects unauthenticated users to the login page.
 * Call this on page load for all authenticated pages.
 */
function requireAuth() {
    if (!getCurrentUser()) {
        window.location.href = 'index.html';
    }
}

/**
 * Log out the current user by clearing session storage and redirecting to login.
 */
function logout() {
    sessionStorage.clear();
    window.location.href = 'index.html';
}
