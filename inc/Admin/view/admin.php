<?php
$ia_doc_show_type = ultd__get_option( 'ia_doc_show_type', 'normal' );

?>
<div class="wrap" id="ultd--app" v-click-outside="onClickOutside">
    <h1 class="ultd--page-title"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M5 5C5 3.89543 5.89543 3 7 3H17C18.1046 3 19 3.89543 19 5V21L12 17.5L5 21V5Z" stroke="#4B3BFD"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M9 7.40001C9 6.73727 9.53726 6.20001 10.2 6.20001H13.8C14.4627 6.20001 15 6.73727 15 7.40001V15.8L12 14.3L9 15.8V7.40001Z"
                fill="#4B3BFD" fill-opacity="0.3" />
        </svg>
        <?php _e( 'UltimateDoc', 'ultimate-doc' );?>

        <a class="fd-doc-page-title" href="#" v-on:click.prevent="addDoc"><svg width="12" height="12"
                viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 1.5V6M6 6V10.5M6 6H10.5M6 6L1.5 6" stroke="#2D2D31" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <?php _e( 'Add new doc', 'ultimate-doc' );?>
        </a>

    </h1>


    <span class="spinner is-active" style="float: none;"></span>

    <ul class="docs not-loaded ultd--masonry" v-sortable>
        <li class="single-doc doc-title" v-for="(doc, index) in docs" :data-id="doc.post.id">
            <h3>

                <a v-if="doc.post.caps.edit" target="_blank" :href="editurl + doc.post.id">
                    <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.00004 1.91666L2.00004 1.92249M2.00004 5.99999L2.00004 6.00583M2.00004 10.0833L2.00004 10.0892M2.00004 2.49999C1.67787 2.49999 1.41671 2.23883 1.41671 1.91666C1.41671 1.5945 1.67787 1.33333 2.00004 1.33333C2.32221 1.33333 2.58337 1.5945 2.58337 1.91666C2.58337 2.23883 2.32221 2.49999 2.00004 2.49999ZM2.00004 6.58333C1.67787 6.58333 1.41671 6.32216 1.41671 5.99999C1.41671 5.67783 1.67787 5.41666 2.00004 5.41666C2.32221 5.41666 2.58337 5.67783 2.58337 5.99999C2.58337 6.32216 2.32221 6.58333 2.00004 6.58333ZM2.00004 10.6667C1.67787 10.6667 1.41671 10.4055 1.41671 10.0833C1.41671 9.76116 1.67787 9.49999 2.00004 9.49999C2.32221 9.49999 2.58337 9.76116 2.58337 10.0833C2.58337 10.4055 2.32221 10.6667 2.00004 10.6667Z"
                            stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M7.00004 1.91666L7.00004 1.92249M7.00004 5.99999L7.00004 6.00583M7.00004 10.0833L7.00004 10.0892M7.00004 2.49999C6.67787 2.49999 6.41671 2.23883 6.41671 1.91666C6.41671 1.5945 6.67787 1.33333 7.00004 1.33333C7.32221 1.33333 7.58337 1.5945 7.58337 1.91666C7.58337 2.23883 7.32221 2.49999 7.00004 2.49999ZM7.00004 6.58333C6.67787 6.58333 6.41671 6.32216 6.41671 5.99999C6.41671 5.67783 6.67787 5.41666 7.00004 5.41666C7.32221 5.41666 7.58337 5.67783 7.58337 5.99999C7.58337 6.32216 7.32221 6.58333 7.00004 6.58333ZM7.00004 10.6667C6.67787 10.6667 6.41671 10.4055 6.41671 10.0833C6.41671 9.76116 6.67787 9.49999 7.00004 9.49999C7.32221 9.49999 7.58337 9.76116 7.58337 10.0833C7.58337 10.4055 7.32221 10.6667 7.00004 10.6667Z"
                            stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="ultd--title">{{ doc.post.title }}</span>
                    <span v-if="doc.post.status != 'publish'" class="doc-status">{{ doc.post.status }}</span></a>
                <span v-else>{{ doc.post.title }}<span v-if="doc.post.status != 'publish'"
                        class="doc-status">{{ doc.post.status }}</span></span>

                <span class="ultd--row-actions">
                    <ul class="actions-menu">
                        <li>
                            <span class="toggler" v-on:click="actionMenu"><svg width="12" height="4" viewBox="0 0 12 4"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.91671 1.99999H1.92254M6.00004 1.99999H6.00587M10.0834 1.99999H10.0892M2.50004 1.99999C2.50004 2.32216 2.23887 2.58332 1.91671 2.58332C1.59454 2.58332 1.33337 2.32216 1.33337 1.99999C1.33337 1.67782 1.59454 1.41666 1.91671 1.41666C2.23887 1.41666 2.50004 1.67782 2.50004 1.99999ZM6.58337 1.99999C6.58337 2.32216 6.32221 2.58332 6.00004 2.58332C5.67787 2.58332 5.41671 2.32216 5.41671 1.99999C5.41671 1.67782 5.67787 1.41666 6.00004 1.41666C6.32221 1.41666 6.58337 1.67782 6.58337 1.99999ZM10.6667 1.99999C10.6667 2.32216 10.4055 2.58332 10.0834 2.58332C9.76121 2.58332 9.50004 2.32216 9.50004 1.99999C9.50004 1.67782 9.76121 1.41666 10.0834 1.41666C10.4055 1.41666 10.6667 1.67782 10.6667 1.99999Z"
                                        stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <ul class="action-sub-menu">
                                <li>
                                    <a target="_blank" :href="viewurl + doc.post.id"
                                        title="<?php esc_attr_e( 'View the doc', 'ultimate-doc' );?>">
                                        <?php esc_attr_e( 'View', 'ultimate-doc' );?> </a>
                                </li>
                                <li>
                                    <a target="_blank" href="#" v-on:click.prevent="quickEdit(doc, $event)"
                                        title="<?php esc_attr_e( 'Wuick Edit the doc', 'ultimate-doc' );?>">
                                        <?php esc_attr_e( 'Quick Edit', 'ultimate-doc' );?> </a>
                                </li>
                                <li>
                                    <a target="_blank" :href="editurl + doc.post.id"
                                        title="<?php esc_attr_e( 'Edit the doc', 'ultimate-doc' );?>">
                                        <?php esc_attr_e( 'Edit', 'ultimate-doc' );?> </a>
                                </li>
                                <li>
                                    <a href="" v-on:click="copyDoc(doc,$event)"
                                        class="copy"><?php esc_html_e( 'Duplicate', 'ultimate-doc' )?></a>
                                </li>
                                <?php if('condition' == $ia_doc_show_type): ?>
                                <li>
                                    <a href="" v-on:click.prevent="showCondition(doc,$event)"
                                        class="copy"><?php esc_html_e( 'Conditions', 'ultimate-doc' )?></a>
                                </li>

                                <?php endif; ?>
                                <li>
                                    <span v-if="doc.post.caps.delete" class="ultd--btn-remove"
                                        v-on:click="removeDoc(index, docs)"
                                        title="<?php esc_attr_e( 'Delete this doc', 'ultimate-doc' );?>"><?php esc_html_e( 'Delete', 'ultimate-doc' )?></span>


                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- <span class="ultd--btn-reorder"><span class="dashicons dashicons-menu"></span></span> -->
                </span>
            </h3>

            <div class="inside">
                <ul class="sections" v-sortable>
                    <li v-for="(section, index) in doc.child" :data-id="section.post.id" class="doc-title">
                        <span class="section-title" v-on:click="toggleCollapse">
                            <a v-if="section.post.caps.edit" target="_blank" :href="editurl + section.post.id">
                                <svg width="9" height="12" viewBox="0 0 9 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.00004 1.91666L2.00004 1.92249M2.00004 5.99999L2.00004 6.00583M2.00004 10.0833L2.00004 10.0892M2.00004 2.49999C1.67787 2.49999 1.41671 2.23883 1.41671 1.91666C1.41671 1.5945 1.67787 1.33333 2.00004 1.33333C2.32221 1.33333 2.58337 1.5945 2.58337 1.91666C2.58337 2.23883 2.32221 2.49999 2.00004 2.49999ZM2.00004 6.58333C1.67787 6.58333 1.41671 6.32216 1.41671 5.99999C1.41671 5.67783 1.67787 5.41666 2.00004 5.41666C2.32221 5.41666 2.58337 5.67783 2.58337 5.99999C2.58337 6.32216 2.32221 6.58333 2.00004 6.58333ZM2.00004 10.6667C1.67787 10.6667 1.41671 10.4055 1.41671 10.0833C1.41671 9.76116 1.67787 9.49999 2.00004 9.49999C2.32221 9.49999 2.58337 9.76116 2.58337 10.0833C2.58337 10.4055 2.32221 10.6667 2.00004 10.6667Z"
                                        stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M7.00004 1.91666L7.00004 1.92249M7.00004 5.99999L7.00004 6.00583M7.00004 10.0833L7.00004 10.0892M7.00004 2.49999C6.67787 2.49999 6.41671 2.23883 6.41671 1.91666C6.41671 1.5945 6.67787 1.33333 7.00004 1.33333C7.32221 1.33333 7.58337 1.5945 7.58337 1.91666C7.58337 2.23883 7.32221 2.49999 7.00004 2.49999ZM7.00004 6.58333C6.67787 6.58333 6.41671 6.32216 6.41671 5.99999C6.41671 5.67783 6.67787 5.41666 7.00004 5.41666C7.32221 5.41666 7.58337 5.67783 7.58337 5.99999C7.58337 6.32216 7.32221 6.58333 7.00004 6.58333ZM7.00004 10.6667C6.67787 10.6667 6.41671 10.4055 6.41671 10.0833C6.41671 9.76116 6.67787 9.49999 7.00004 9.49999C7.32221 9.49999 7.58337 9.76116 7.58337 10.0833C7.58337 10.4055 7.32221 10.6667 7.00004 10.6667Z"
                                        stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="ultd--title">{{ section.post.title }}</span>
                                <span v-if="section.post.status != 'publish'"
                                    class="doc-status">{{ section.post.status }}</span> <span
                                    v-if="section.child.length > 0" class="count">{{ section.child.length }}</span></a>
                            <span v-else>{{ section.post.title }}<span v-if="section.post.status != 'publish'"
                                    class="doc-status">{{ section.post.status }}</span> <span
                                    v-if="section.child.length > 0"
                                    class="count">{{ section.child.length }}</span></span>


                            <span class="ultd--row-actions">
                                <ul class="actions-menu">
                                    <li>
                                        <span class="toggler" v-on:click="actionMenu"><svg width="12" height="4"
                                                viewBox="0 0 12 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M1.91671 1.99999H1.92254M6.00004 1.99999H6.00587M10.0834 1.99999H10.0892M2.50004 1.99999C2.50004 2.32216 2.23887 2.58332 1.91671 2.58332C1.59454 2.58332 1.33337 2.32216 1.33337 1.99999C1.33337 1.67782 1.59454 1.41666 1.91671 1.41666C2.23887 1.41666 2.50004 1.67782 2.50004 1.99999ZM6.58337 1.99999C6.58337 2.32216 6.32221 2.58332 6.00004 2.58332C5.67787 2.58332 5.41671 2.32216 5.41671 1.99999C5.41671 1.67782 5.67787 1.41666 6.00004 1.41666C6.32221 1.41666 6.58337 1.67782 6.58337 1.99999ZM10.6667 1.99999C10.6667 2.32216 10.4055 2.58332 10.0834 2.58332C9.76121 2.58332 9.50004 2.32216 9.50004 1.99999C9.50004 1.67782 9.76121 1.41666 10.0834 1.41666C10.4055 1.41666 10.6667 1.67782 10.6667 1.99999Z"
                                                    stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <ul class="action-sub-menu">
                                            <li>
                                                <a target="_blank" :href="viewurl + section.post.id"
                                                    title="<?php esc_attr_e( 'View the doc', 'ultimate-doc' );?>">
                                                    <?php esc_attr_e( 'View', 'ultimate-doc' );?> </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="#"
                                                    v-on:click.prevent="quickEdit(section, $event)"
                                                    title="<?php esc_attr_e( 'Wuick Edit the doc', 'ultimate-doc' );?>">
                                                    <?php esc_attr_e( 'Quick Edit', 'ultimate-doc' );?> </a>
                                            </li>
                                            <li>
                                                <a target="_blank" :href="editurl + section.post.id"
                                                    title="<?php esc_attr_e( 'Edit the doc', 'ultimate-doc' );?>">
                                                    <?php esc_attr_e( 'Edit', 'ultimate-doc' );?> </a>
                                            </li>
                                            <li>
                                                <a href="" v-on:click="copyDoc(section,$event)"
                                                    class="copy"><?php esc_html_e( 'Duplicate', 'ultimate-doc' )?></a>
                                            </li>
                                            <li>
                                                <span v-if="section.post.caps.delete" class="ultd--btn-remove"
                                                    v-on:click="removeDoc(index, doc.child)"
                                                    title="<?php esc_attr_e( 'Delete this doc', 'ultimate-doc' );?>"><?php esc_html_e( 'Delete', 'ultimate-doc' )?></span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </span>

                        </span>

                        <ul class="articles collapsed connectedSortable" v-if="section.child" v-sortable>
                            <li class="article doc-title" v-for="(article, index) in section.child"
                                :data-id="article.post.id">

                                <span>
                                    <a v-if="article.post.caps.edit" target="_blank" :href="editurl + article.post.id">
                                        <svg width="9" height="12" viewBox="0 0 9 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.00004 1.91666L2.00004 1.92249M2.00004 5.99999L2.00004 6.00583M2.00004 10.0833L2.00004 10.0892M2.00004 2.49999C1.67787 2.49999 1.41671 2.23883 1.41671 1.91666C1.41671 1.5945 1.67787 1.33333 2.00004 1.33333C2.32221 1.33333 2.58337 1.5945 2.58337 1.91666C2.58337 2.23883 2.32221 2.49999 2.00004 2.49999ZM2.00004 6.58333C1.67787 6.58333 1.41671 6.32216 1.41671 5.99999C1.41671 5.67783 1.67787 5.41666 2.00004 5.41666C2.32221 5.41666 2.58337 5.67783 2.58337 5.99999C2.58337 6.32216 2.32221 6.58333 2.00004 6.58333ZM2.00004 10.6667C1.67787 10.6667 1.41671 10.4055 1.41671 10.0833C1.41671 9.76116 1.67787 9.49999 2.00004 9.49999C2.32221 9.49999 2.58337 9.76116 2.58337 10.0833C2.58337 10.4055 2.32221 10.6667 2.00004 10.6667Z"
                                                stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M7.00004 1.91666L7.00004 1.92249M7.00004 5.99999L7.00004 6.00583M7.00004 10.0833L7.00004 10.0892M7.00004 2.49999C6.67787 2.49999 6.41671 2.23883 6.41671 1.91666C6.41671 1.5945 6.67787 1.33333 7.00004 1.33333C7.32221 1.33333 7.58337 1.5945 7.58337 1.91666C7.58337 2.23883 7.32221 2.49999 7.00004 2.49999ZM7.00004 6.58333C6.67787 6.58333 6.41671 6.32216 6.41671 5.99999C6.41671 5.67783 6.67787 5.41666 7.00004 5.41666C7.32221 5.41666 7.58337 5.67783 7.58337 5.99999C7.58337 6.32216 7.32221 6.58333 7.00004 6.58333ZM7.00004 10.6667C6.67787 10.6667 6.41671 10.4055 6.41671 10.0833C6.41671 9.76116 6.67787 9.49999 7.00004 9.49999C7.32221 9.49999 7.58337 9.76116 7.58337 10.0833C7.58337 10.4055 7.32221 10.6667 7.00004 10.6667Z"
                                                stroke="#111827" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span class="ultd--title">{{ article.post.title }}</span>
                                        <span v-if="article.post.status != 'publish'"
                                            class="doc-status">{{ article.post.status }}</span></a>
                                    <span v-else>{{ article.post.title }}</span>

                                    <span class="actions ultd--row-actions">

                                        <ul class="actions-menu">
                                            <li>
                                                <span class="toggler" v-on:click="actionMenu"><svg width="12" height="4"
                                                        viewBox="0 0 12 4" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.91671 1.99999H1.92254M6.00004 1.99999H6.00587M10.0834 1.99999H10.0892M2.50004 1.99999C2.50004 2.32216 2.23887 2.58332 1.91671 2.58332C1.59454 2.58332 1.33337 2.32216 1.33337 1.99999C1.33337 1.67782 1.59454 1.41666 1.91671 1.41666C2.23887 1.41666 2.50004 1.67782 2.50004 1.99999ZM6.58337 1.99999C6.58337 2.32216 6.32221 2.58332 6.00004 2.58332C5.67787 2.58332 5.41671 2.32216 5.41671 1.99999C5.41671 1.67782 5.67787 1.41666 6.00004 1.41666C6.32221 1.41666 6.58337 1.67782 6.58337 1.99999ZM10.6667 1.99999C10.6667 2.32216 10.4055 2.58332 10.0834 2.58332C9.76121 2.58332 9.50004 2.32216 9.50004 1.99999C9.50004 1.67782 9.76121 1.41666 10.0834 1.41666C10.4055 1.41666 10.6667 1.67782 10.6667 1.99999Z"
                                                            stroke="#111827" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <ul class="action-sub-menu">
                                                    <li>
                                                        <a target="_blank" :href="viewurl + article.post.id"
                                                            title="<?php esc_attr_e( 'View the doc', 'ultimate-doc' );?>">
                                                            <?php esc_attr_e( 'View', 'ultimate-doc' );?> </a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" href="#"
                                                            v-on:click.prevent="quickEdit(article, $event)"
                                                            title="<?php esc_attr_e( 'Wuick Edit the doc', 'ultimate-doc' );?>">
                                                            <?php esc_attr_e( 'Quick Edit', 'ultimate-doc' );?> </a>
                                                    </li>
                                                    <li>
                                                        <a target="_blank" :href="editurl + article.post.id"
                                                            title="<?php esc_attr_e( 'Edit the doc', 'ultimate-doc' );?>">
                                                            <?php esc_attr_e( 'Edit', 'ultimate-doc' );?> </a>
                                                    </li>

                                                    <li>
                                                        <a href="" v-on:click="copyDoc(article,$event)"
                                                            class="copy"><?php esc_html_e( 'Duplicate', 'ultimate-doc' )?></a>
                                                    </li>
                                                    <li>
                                                        <span v-if="article.post.caps.delete" class="ultd--btn-remove"
                                                            v-on:click="removeArticle(index, section.child)"
                                                            title="<?php esc_attr_e( 'Delete this doc', 'ultimate-doc' );?>"><?php esc_html_e( 'Delete', 'ultimate-doc' )?></span>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                    </span>
                                </span>

                                <ul class="articles" v-if="article.child.length">
                                    <li v-for="(art, index) in article.child">
                                        <a v-if="art.post.caps.edit" target="_blank"
                                            :href="editurl + art.post.id">{{ art.post.title }}<span
                                                v-if="art.post.status != 'publish'"
                                                class="doc-status">{{ art.post.status }}</span></a>
                                        <span v-else>{{ art.post.title }}</span>

                                        <span class="actions ultd--row-actions">
                                            <a target="_blank" :href="viewurl + article.post.id"
                                                title="<?php esc_attr_e( 'Preview the article', 'ultimate-doc' );?>"><span
                                                    class="dashicons dashicons-external"></span></a>
                                            <span class="ultd--btn-remove" v-if="art.post.caps.delete"
                                                v-on:click="removeArticle(index, article.child)"
                                                title="<?php esc_attr_e( 'Delete this article', 'ultimate-doc' );?>"><span
                                                    class="dashicons dashicons-trash"></span></span>
                                            <span class="ultd--btn-add" v-on:click.prevent="addSection(doc)"
                                                title="<?php esc_attr_e( 'Add article', 'ultimate-doc' );?>"><span
                                                    class="dashicons dashicons-plus"></span></span>
                                        </span>
                                    </li>
                                </ul>
                            </li>
                            <div>
                                <span class="add-article" v-on:click="addArticle(section,$event)"
                                    title="<?php esc_attr_e( 'Add a new article', 'ultimate-doc' );?>">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 1.5V6M6 6V10.5M6 6H10.5M6 6L1.5 6" stroke="#F9FAFB" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <?php esc_html_e( 'Add new article', 'ultimate-doc' )?></span>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="add-section">
                <a class="add-section-btn" href="#" v-on:click.prevent="addSection(doc)">

                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 1.5V6M6 6V10.5M6 6H10.5M6 6L1.5 6" stroke="#2D2D31" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <?php _e( 'Add Section', 'ultimate-doc' );?>
                </a>
            </div>
        </li>
    </ul>

    <div class="ultd--no-docs not-loaded" v-show="!docs.length">
        <svg width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M32.4167 32.3333H5.58333C3.46624 32.3333 1.75 30.6171 1.75 28.5L1.75 5.49999C1.75 3.3829 3.46624 1.66666 5.58333 1.66666L24.75 1.66666C26.8671 1.66666 28.5833 3.3829 28.5833 5.49999V7.41666M32.4167 32.3333C30.2996 32.3333 28.5833 30.6171 28.5833 28.5L28.5833 7.41666M32.4167 32.3333C34.5338 32.3333 36.25 30.6171 36.25 28.5V11.25C36.25 9.1329 34.5338 7.41666 32.4167 7.41666L28.5833 7.41666M20.9167 1.66666L13.25 1.66666M9.41667 24.6667H20.9167M9.41667 9.33332H20.9167V17H9.41667V9.33332Z" stroke="#161617" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        
        <h4><?php esc_html_e( 'No docs has been found', 'ultimate-doc' ) ?></h4>
        <p><?php esc_html_e( 'You don’t have any doc yet, but you can always create a new one.', 'ultimate-doc' ) ?></p>
        <a class="fd-doc-page-title" href="#" v-on:click.prevent="addDoc"><svg width="12" height="12"
                viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 1.5V6M6 6V10.5M6 6H10.5M6 6L1.5 6" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <?php _e( 'Add new doc', 'ultimate-doc' );?>
        </a>
        <!-- <?php printf('<h4>' . __( 'No docs has been found. Perhaps %s?', 'ultimate-doc' ). 'h', '<a href="#" v-on:click.prevent="addDoc">' . __( 'create one', 'ultimate-doc' ) . '</a>' );?> -->
    </div>



</div>