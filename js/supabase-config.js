/**
 * Supabase Configuration and Auth Utilities
 * 
 * Initializes the Supabase client and provides authentication helper functions.
 * This file assumes the Supabase SDK is loaded via a <script> tag from CDN:
 * https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2
 */

// Supabase project configuration
var SUPABASE_URL = 'https://mvqzkhdosclvtmislkts.supabase.co';
var SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6Im12cXpraGRvc2NsdnRtaXNsa3RzIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Nzg3NDYxMjksImV4cCI6MjA5NDMyMjEyOX0.lZaKmjiiZomAkbmgtr5bptZngQqftJ_RS4IBQS3_wKQ';

// Initialize Supabase client
// The CDN UMD bundle sets window.supabase = { createClient: fn }
// We store our client in a different variable name to avoid conflicts
var _supabaseSDK = window.supabase;
var supabase = _supabaseSDK.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

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
