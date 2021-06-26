<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(['web', 'var', 'vendor', 'node_modules', 'assets', 'src/Migrations'])
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@DoctrineAnnotation' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => ['statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try', 'foreach']],
        'braces' => ['allow_single_line_closure' => true],
        'class_attributes_separation' => ['elements' => ['method']],
        'compact_nullable_typehint' => true,
        'concat_space' => ['spacing' => 'one'],
        'declare_equal_normalize' => ['space' => 'none'],
        'function_declaration' => ['closure_function_spacing' => 'one'],
        'function_typehint_space' => true,
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'native_function_invocation' => ['include' => ['@compiler_optimized'], 'scope' => 'namespaced'],
        'new_with_braces' => true,
        'no_empty_comment' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'no_extra_blank_lines' => true,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_superfluous_phpdoc_tags' => true,
        'no_unused_imports' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line' => true,
        'ordered_class_elements' => ['order' => ['use_trait', 'constant']],
        'ordered_imports' => true,
        'return_type_declaration' => ['space_before' => 'none'],
        'single_blank_line_before_namespace' => true,
        'ternary_operator_spaces' => true,
        'trim_array_spaces' => true
    ])
    ->setFinder($finder)
;
