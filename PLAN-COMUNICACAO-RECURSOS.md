# Comunicacao-Recursos - CakePHP 5 App Implementation Plan

> [!NOTE]
> **PLAN STATUS: VERIFIED & FINALIZED** (2026-05-26)  
> This implementation plan has been verified against the legacy CakePHP 2.x `comunica_andes` database schema and is approved for development. All legacy database field and relationship mappings have been resolved.

## Project Overview
**Comunicacao-Recursos** is a communications resource database and directory system for union sections. It provides searchable, filterable access to communication infrastructure data for Andes-SN's member sections (secciones sindicales), organized by region, state, and sector.

**Technology Stack:**
- CakePHP 5.x (latest stable)
- PHP 8.1+
- MySQL 8.0+
- Bootstrap 5 (frontend styling)
- Local development environment

---

## Core Features

### Communication Resources Database
1. **Ssindicais (Union Sections)** - Directory of sections with communication data
   - Section name and identification
   - Regional structure (region, state, sector)
   - Contact information
   - Website links
   - Social media links (Facebook, YouTube, etc.)
   - Communication notes

2. **Históricos (Historical Records)** - Track changes over time
   - Year-based tracking
   - Archive historical section data
   - Track contact/website changes

### Reference & Lookup Operations
- Browse all union sections
- Search by section name
- Filter by region (regional)
- Filter by state (estados)
- Filter by sector (sectores)
- View section details
- Table/spreadsheet view
- Historical data access

---

## Implementation Phases

### PHASE 1: Project Setup & Infrastructure
**Deliverable:** Working CakePHP 5 project with database ready

- Initialize new CakePHP 5 project
- Configure MySQL 8.0+ database
- Create schema with migrations
- Setup project structure
- Install Bootstrap 5 and dependencies

**Tasks:**
- `recursos-setup-project`: Create new CakePHP 5 project
- `recursos-create-schema`: Design MySQL schema
- `recursos-configure-db`: Setup database config
- `recursos-install-deps`: Install Bootstrap 5 and libs

---

### PHASE 2: Authentication & User Management
**Deliverable:** Secure login system with role-based access

- Implement PSR-15 Authentication middleware
- Create User model with validation
- Build login/logout flow
- Setup role-based authorization (admin/editor/viewer)
- Implement modern password hashing

**Tasks:**
- `recursos-auth-setup`: Configure Authentication middleware
- `recursos-user-model`: Create User model
- `recursos-login-controller`: Build login/logout controller
- `recursos-login-views`: Create login and dashboard pages
- `recursos-auth-middleware`: Setup access control

---

### PHASE 3: Core Data Models
**Deliverable:** Models with proper relationships

- Create Ssindical model
- Create Historico model
- Setup belongsTo/hasMany relationships
- Add validation rules
- Setup model scopes for filtering

**Tasks:**
- `recursos-models-ssindicais`: Create Ssindical model
- `recursos-models-historicos`: Create Historico model
- `recursos-models-relationships`: Setup all relationships

---

### PHASE 4: Ssindicais Module (Union Sections)
**Deliverable:** Complete CRUD for sections directory

**4a. Controller & Actions**
- Index (list all sections)
- Create/Add
- Edit
- View/Detail
- Delete
- Search (by section name)
- Filter by region (regionais)
- Filter by state (estados)
- Filter by sector (sectores)
- Table view (spreadsheet format)
- Export (CSV)

**4b. Features**
- Pagination (10-50 items per page)
- Alphabetical sorting by section name
- Multi-column search
- Advanced filtering (region AND state AND sector combinations)
- Historical data display
- Contact information display
- Links to websites and social media
- Related historical records display

**4c. Views with Bootstrap 5**
- Main list/directory view with filters
- Create form (name, region, state, sector, contacts, links)
- Edit form
- Detail view (with full info and historical records)
- Table/spreadsheet view
- Filter views (by region, state, sector separately)
- Search results page

**Tasks:**
- `recursos-ssindicais-controller`: Build full CRUD controller
- `recursos-ssindicais-views`: Create all views (index, add, edit, view, table)
- `recursos-ssindicais-filters`: Implement region/state/sector filters
- `recursos-ssindicais-search`: Build search functionality
- `recursos-ssindicais-components`: Build reusable components

---

### PHASE 5: Históricos Module (Historical Records)
**Deliverable:** Track changes and history

**5a. Features**
- Display historical records per section
- Year-based organization
- Archive old records
- View/compare historical versions
- Track contact/info changes over time

**5b. Views with Bootstrap 5**
- Historical records list per section
- Timeline view (optional)
- Detail view of historical record
- Archive list

**Tasks:**
- `recursos-historicos-controller`: Build historicos CRUD
- `recursos-historicos-views`: Create historical views (list, detail, timeline)
- `recursos-historicos-management`: Implement archive/restore

---

### PHASE 6: Filtering & Navigation
**Deliverable:** Multi-level filtering system

**6a. Filter Types**
- Regionais (regions)
- Estados (states)
- Sectores (sectors/sectors)
- Combined filters (e.g., region + state + sector)
- Text search

**6b. Components**
- Filter sidebar/dropdown
- Active filter badges
- Clear filters button
- Filter combinations display

**Tasks:**
- `recursos-filters-controller`: Build filter logic
- `recursos-filters-views`: Create filter UI components
- `recursos-filters-combined`: Implement combined filtering

---

### PHASE 7: Search & Discovery
**Deliverable:** Powerful search capabilities

- Full-text search on section names
- Search on contact information
- Search on websites/links
- Quick find/autocomplete
- Search results view

**Tasks:**
- `recursos-search-controller`: Build search functionality
- `recursos-search-views`: Create search interface and results
- `recursos-search-autocomplete`: Add autocomplete suggestions

---

### PHASE 8: UI & Layout
**Deliverable:** Professional, responsive Bootstrap 5 interface

**8a. Main Layout**
- Responsive navbar with user menu
- Navigation between sections and filters
- Logo and branding
- Footer with info

**8b. Components**
- Form components (text, select, multi-select for filters)
- Table/list components with pagination
- Filter controls and badges
- Card components for section display
- Action buttons

**8c. Views**
- Dashboard/home page
- Directory view
- Error pages (404, 403, 500)
- Empty states

**Tasks:**
- `recursos-layout-bootstrap`: Create main Bootstrap 5 layout
- `recursos-dashboard-view`: Build dashboard
- `recursos-form-components`: Build reusable forms
- `recursos-list-components`: Build list/table components
- `recursos-error-pages`: Create error pages

---

### PHASE 9: Advanced Features
**Deliverable:** Polish and additional functionality

- Advanced multi-filter combinations
- Sort by multiple columns (name, region, state)
- Export to CSV
- Bulk import (optional)
- Map view (optional, if location data added)
- Print-friendly views

**Tasks:**
- `recursos-sorting-advanced`: Implement advanced sorting
- `recursos-export-csv`: Add CSV export
- `recursos-import-bulk`: Optional bulk import
- `recursos-print-views`: Add print-friendly versions

---

### PHASE 10: Security & Polish
**Deliverable:** Production-ready security

- CSRF protection
- Input validation/sanitization
- SQL injection prevention
- Permission checks
- Session security
- Rate limiting

**Tasks:**
- `recursos-security-csrf`: CSRF protection
- `recursos-security-input`: Input validation
- `recursos-security-auth`: Permission checks
- `recursos-security-general`: Security hardening

---

### PHASE 11: Testing
**Deliverable:** Tested code with quality assurance

- Setup PHPUnit tests
- Test authentication
- Test filters and search
- Test CRUD operations
- Test permissions

**Tasks:**
- `recursos-test-setup`: Setup testing
- `recursos-test-auth`: Auth tests
- `recursos-test-filters`: Filter tests
- `recursos-test-crud`: CRUD tests

---

### PHASE 12: Documentation & Deployment
**Deliverable:** Ready for production

- Setup documentation
- Deployment guide
- User manual
- API documentation

**Tasks:**
- `recursos-docs-setup`: Setup documentation
- `recursos-docs-deploy`: Deployment guide
- `recursos-docs-user`: User manual

---

## Plan Verification & Legacy Schema Alignment

We have verified the plan against the legacy CakePHP 2.x `comunica_andes` database. The following alignments have been established to guarantee 100% data integrity and seamless database migration:

### 1. Ssindicais Table Compatibility
* **Primary Key:** The legacy database uses `Id` (capitalized) instead of the standard CakePHP lower-case `id`. The new CakePHP 5 model must define `protected $_primaryKey = 'Id';` in its Table class to match.
* **Display Field:** Legacy uses `Secao_sindical` as the display field, which maps to `secao_sindical` (or `Secao_sindical` directly if reusing the same table).
* **Field Mapping:**
  - `Site` in legacy maps to `website` (or will be retained as `Site` to avoid renaming overhead).
  - `Observacoes` in legacy maps to `notas` (or will be retained as `Observacoes`).
  - Legacy fields `Secao_sindical_extenso` and `Pulsefeed` are preserved for backward compatibility.

### 2. Historicos Table Alignment
* **Legacy Purpose:** The legacy `historicos` table actually tracks section events (e.g., `Eleições` with `quantidade` of voters/votes and general `observacoes` per year).
* **Alignment Strategy:** The migration will fully preserve and support the legacy schema fields (`evento`, `quantidade`, `observacoes`, `ano`, `ssindical_id`) while providing modern CakePHP 5 entities and query pagination for historic event records.

---

## Database Schema

### Tables

**users**
- id (PK)
- username (unique)
- password (hashed)
- role (admin, editor, viewer)
- created_at
- updated_at

**ssindicais**
- id (PK) [or Id for compatibility]
- secao_sindical (string) - Section name
- regional (string) - Region
- estado (string) - State
- setor (string) - Sector
- website (string, nullable) - URL
- facebook (string, nullable) - Facebook URL
- youtube (string, nullable) - YouTube URL
- contact_email (string, nullable)
- contact_phone (string, nullable)
- notas (text, nullable) - General notes
- ativo (boolean, default: true)
- created_at
- updated_at

**historicos**
- id (PK)
- ssindical_id (FK)
- ano (integer) - Year
- secao_sindical (string) - Historical section name (if changed)
- website (string, nullable)
- facebook (string, nullable)
- youtube (string, nullable)
- contact_email (string, nullable)
- contact_phone (string, nullable)
- notas (text, nullable)
- arquivado (boolean, default: false)
- created_at
- updated_at

---

## Filtering Strategy

### Available Filters
1. **Regionais** - Group by region (dropdown/list)
2. **Estados** - Group by state (dropdown/list)
3. **Sectores** - Group by sector (dropdown/list)
4. **Combined** - Region + State + Sector combinations

### Filter Views
- `/ssindicais/regionais/name` - Show all sections in region
- `/ssindicais/estados/name` - Show all sections in state
- `/ssindicais/sectores/name` - Show all sections in sector
- `/ssindicais/index?region=X&estado=Y&setor=Z` - Combined filters

---

## Key Decisions

✅ **Read-heavy database** - Optimized for browsing and filtering
✅ **Reference data focus** - Historical tracking built-in
✅ **Simple role model** - admin/editor/viewer (viewer can only read)
✅ **Flexible filtering** - Multiple ways to discover sections
✅ **Historical tracking** - Track changes over time
✅ **Bootstrap 5 UI** - Professional, responsive

---

## Success Criteria

✅ Browsing and searching functional
✅ All filters working (region, state, sector, combined)
✅ Pagination and sorting working
✅ Historical records displayed
✅ Authentication/authorization working
✅ Responsive Bootstrap 5 UI
✅ Data relationships maintained
✅ Export functionality working
✅ Performance acceptable for large datasets
✅ Code tested and documented
