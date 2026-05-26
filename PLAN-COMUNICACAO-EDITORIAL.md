# Comunicacao-Editorial - CakePHP 5 App Implementation Plan

## Project Overview
**Comunicacao-Editorial** is a modern journalism workflow and content management system for managing editorial agendas, articles, and publications. Designed for Andes-SN's editorial team with collaborative features and publishing workflow.

**Technology Stack:**
- CakePHP 5.x (latest stable)
- PHP 8.1+
- MySQL 8.0+
- Bootstrap 5 (frontend styling)
- Local development environment

---

## Core Features

### Editorial Workflow
1. **Pautas (Editorial Agendas)** - Planning/assignment documents
   - Create/edit editorial agendas
   - Archive old pautas
   - Target audience: website vs newsletter ("informandes")
   - Internal discussion via comments

2. **Matérias (Articles)** - Content/articles for publication
   - Create/edit articles from pautas
   - Multiple file attachments
   - Tag-based categorization
   - Internal observations/comments
   - Target audience filtering
   - Archive functionality

3. **Tags** - Content categorization
   - Create/manage tags
   - HABTM relationship with articles
   - Quick filtering

4. **Comments & Discussions**
   - Comments on pautas (Comentapautas)
   - Observations on articles (Observacoes)
   - Collaborative workflow tracking

### Core Operations
- Full CRUD for pautas and articles
- File upload/management (store in `/webroot/files/`)
- Pagination and sorting (most recent first)
- Search by title, content
- Filter by archive status and target audience
- Responsive Bootstrap 5 UI

---

## Implementation Phases

### PHASE 1: Project Setup & Infrastructure
**Deliverable:** Working CakePHP 5 project with database ready

- Initialize new CakePHP 5 project
- Configure MySQL 8.0+ database
- Create schema with migrations
- Setup project structure and conventions
- Install Bootstrap 5 and dependencies

**Tasks:**
- `editorial-setup-project`: Create new CakePHP 5 project
- `editorial-create-schema`: Design MySQL schema
- `editorial-configure-db`: Setup database config
- `editorial-install-deps`: Install Bootstrap 5 and libs

---

### PHASE 2: Authentication & User Management
**Deliverable:** Secure login system with role-based access

- Implement PSR-15 Authentication middleware
- Create User model with validation
- Build login/logout flow
- Setup role-based authorization (admin/editor)
- Implement modern password hashing

**Tasks:**
- `editorial-auth-setup`: Configure Authentication middleware
- `editorial-user-model`: Create User model
- `editorial-login-controller`: Build login/logout controller
- `editorial-login-views`: Create login and dashboard pages
- `editorial-auth-middleware`: Setup access control

---

### PHASE 3: Core Data Models
**Deliverable:** All models with proper relationships

- Create Pauta model
- Create Materia model
- Create Tag model
- Create Comentapauta model
- Create Observacoe model
- Create MateriaTag join model
- Setup all relationships (belongsTo, hasMany, HABTM)
- Add validation rules

**Tasks:**
- `editorial-models-pautas`: Create Pauta model
- `editorial-models-materias`: Create Materia model with relationships
- `editorial-models-tags`: Create Tag model and HABTM
- `editorial-models-comments`: Create Comentapauta and Observacoe models

---

### PHASE 4: Pautas Module (Editorial Agendas)
**Deliverable:** Complete CRUD for editorial agendas

**4a. Controller & Actions**
- Index (paginated, filterable)
- Create/Add
- Edit
- View/Detail
- Archive
- Restore from archive
- Delete

**4b. Features**
- Pagination (10 items per page)
- Filter by archive status
- Filter by target audience (website/informandes)
- Chronological sorting (newest first)
- Bulk archive/restore
- Associated materials count
- Related comments display

**4c. Views with Bootstrap 5**
- Dashboard/index with filters and pagination
- Create form (date, target audience, notes)
- Edit form
- Detail view (with related materials and comments)
- Archive list view
- Confirmation dialogs

**Tasks:**
- `editorial-pautas-controller`: Build full CRUD controller
- `editorial-pautas-views`: Create all views (index, add, edit, view, archive)
- `editorial-pautas-filters`: Implement filtering and sorting
- `editorial-pautas-components`: Build reusable components (list items, forms)

---

### PHASE 5: Matérias Module (Articles)
**Deliverable:** Complete CRUD for articles with file management

**5a. Controller & Actions**
- Index (paginated, searchable)
- Create/Add (with file upload)
- Edit (update files)
- View/Detail
- Archive
- Restore from archive
- Delete
- Search

**5b. Features**
- File upload handling (multiple files per article)
- File naming convention: `materia-{YYYY-MM-DD-HH:mm}-{index}.{ext}`
- File deletion
- Tag assignment (HABTM)
- Related Pauta selection
- Observations/comments
- Archive management
- Search across title, content, tags
- Filter by archive, target audience

**5c. Views with Bootstrap 5**
- List view with pagination and search
- Create form (pauta selection, title, content, tags, files, target)
- Edit form
- Detail view (with tags, files, observations, related pauta)
- Archive list
- File manager (upload/delete UI)

**Tasks:**
- `editorial-materias-controller`: Build full CRUD controller with file handling
- `editorial-materias-views`: Create all views (index, add, edit, view, archive, search)
- `editorial-materias-files`: Implement file upload/delete/management
- `editorial-materias-tags`: Integrate tag system with articles
- `editorial-materias-observations`: Build observations/comments feature

---

### PHASE 6: Tags System
**Deliverable:** Tag management and HABTM relationship

- Create Tag model
- Create MateriaTag join model
- Tag CRUD (create, list, delete)
- Assign tags to articles
- Filter articles by tag
- Quick tag suggestions

**Tasks:**
- `editorial-tags-model`: Setup Tag and MateriaTag models
- `editorial-tags-controller`: Build tag management controller
- `editorial-tags-views`: Create tag list and management views
- `editorial-tags-integration`: Integrate with article creation/editing

---

### PHASE 7: Comments & Observations
**Deliverable:** Collaborative discussion features

- Comment on pautas (Comentapautas)
- Comment on articles (Observacoes)
- Display comment threads
- Delete comments

**Tasks:**
- `editorial-comments-models`: Setup comment models
- `editorial-comments-display`: Build comment display components
- `editorial-comments-add`: Build comment submission forms

---

### PHASE 8: UI & Layout
**Deliverable:** Professional, responsive Bootstrap 5 interface

**8a. Main Layout**
- Responsive navbar with user menu
- Sidebar navigation (optional)
- Logo and branding
- Footer

**8b. Components**
- Form components (text, select, file upload, date picker)
- Table/list components with pagination
- Filter controls
- Action buttons (edit, delete, archive, etc.)
- Alert/notification messages
- Modals for confirmations

**8c. Views**
- Dashboard/home page
- Error pages (404, 403, 500)
- Loading states
- Empty states

**Tasks:**
- `editorial-layout-bootstrap`: Create main Bootstrap 5 layout
- `editorial-dashboard-view`: Build dashboard page
- `editorial-form-components`: Build reusable form components
- `editorial-list-components`: Build reusable list/table components
- `editorial-error-pages`: Create error pages

---

### PHASE 9: Advanced Features
**Deliverable:** Polish and additional functionality

- Pagination and sorting refinement
- Advanced search/filters
- Bulk operations (archive multiple)
- Export/download options (CSV, PDF preview)
- Validation and error handling
- Flash messages
- Pagination history

**Tasks:**
- `editorial-pagination-sorting`: Implement advanced pagination
- `editorial-search-advanced`: Build advanced search
- `editorial-bulk-operations`: Implement bulk actions
- `editorial-export`: Add export functionality
- `editorial-validation`: Setup comprehensive validation
- `editorial-error-handling`: Error messages and logging

---

### PHASE 10: Security & Polish
**Deliverable:** Production-ready security and optimization

- CSRF protection
- Input sanitization
- SQL injection prevention (parameterized queries)
- Password security (modern hashing)
- Session security
- Rate limiting on file uploads
- Permission checks on all actions

**Tasks:**
- `editorial-security-csrf`: CSRF token protection
- `editorial-security-input`: Input validation/sanitization
- `editorial-security-auth`: Permission checks
- `editorial-security-files`: File upload security

---

### PHASE 11: Testing
**Deliverable:** Tested code with quality assurance

- Setup PHPUnit tests
- Test authentication flows
- Test CRUD operations
- Test file uploads
- Test permissions
- Test validation

**Tasks:**
- `editorial-test-setup`: Setup testing infrastructure
- `editorial-test-auth`: Write authentication tests
- `editorial-test-crud`: Write CRUD tests
- `editorial-test-files`: Write file handling tests

---

### PHASE 12: Documentation & Deployment
**Deliverable:** Ready for production

- Code documentation
- Setup instructions
- Deployment guide
- User manual/help
- Configuration guide

**Tasks:**
- `editorial-docs-setup`: Write setup documentation
- `editorial-docs-deploy`: Write deployment guide
- `editorial-docs-user`: Write user manual
- `editorial-docs-api`: Document API/technical details

---

## Database Schema

### Tables

**users**
- id (PK)
- username (unique)
- password (hashed)
- role (admin, editor)
- created_at
- updated_at

**pautas**
- id (PK)
- data (date)
- descricao (text, optional)
- arquivar (boolean, default: false)
- informandes (boolean, default: false) - 0=website, 1=newsletter
- created_at
- updated_at

**materias**
- id (PK)
- pauta_id (FK, nullable)
- titulo (string)
- conteudo (text)
- data (date)
- arquivar (boolean, default: false)
- informandes (boolean, default: false)
- anexos (text - comma-separated filenames)
- created_at
- updated_at

**tags**
- id (PK)
- nome (string, unique)
- descricao (text, optional)
- created_at
- updated_at

**materias_tags** (HABTM Join)
- id (PK)
- materia_id (FK)
- tag_id (FK)

**comentapautas**
- id (PK)
- pauta_id (FK)
- usuario_id (FK, optional)
- comentario (text)
- created_at
- updated_at

**observacoes**
- id (PK)
- materia_id (FK)
- usuario_id (FK, optional)
- observacao (text)
- created_at
- updated_at

---

## File Storage

- **Location:** `/webroot/files/`
- **Naming:** `materia-{YYYY-MM-DD-HH:mm}-{index}.{extension}`
- **Permissions:** Readable by web server
- **Cleanup:** Old files can be archived/deleted via admin function

---

## Key Decisions

✅ **Modern CakePHP 5** - PSR-15 middleware, type hints, modern PHP
✅ **Separate from Resources DB** - Focused, independent application
✅ **Bootstrap 5 UI** - Professional, responsive, maintained
✅ **Single responsibility** - Editorial workflow only
✅ **Collaborative** - Comments and observations built-in
✅ **Flexible publishing** - Target audience filtering

---

## Success Criteria

✅ All CRUD operations working smoothly
✅ File uploads reliable and secure
✅ Authentication/authorization working
✅ Responsive Bootstrap 5 UI
✅ Pagination and filtering functional
✅ Comments/observations working
✅ Data relationships maintained
✅ Error handling and validation in place
✅ Performance acceptable
✅ Code well-tested and documented
